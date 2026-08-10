
class eclCom_multileiturasLivro_audiobook extends eclCom {
    range; // the range element
    audio; // the audio element

    currentTime = 0;
    timeMonitor = 0;
    duration = 0;
    paused = true;
    rate = 1;
    volume = 100;

    configuration = {};
    errorMessage = false;
    name;
    src = '';
    book = {};
    firstPositioned = false;

    connectedCallback() {
        this.track('book');
        this.track('currentTime');
        this.track('duration');
        this.track('errorMessage');
        this.track('paused');
        this.track('rate');
        this.track('volume');


        this.name = page.application.parent.name;

        io.request()
            .then(response => {
                this.book = response.book;
                this.retrieveConfiguration();
                this.audio = document.createElement('audio');
                document.body.appendChild(this.audio);
                this.audio.src = response.url;
                this.audio.onloadedmetadata = () => {
                    this.duration = this.audio.duration;
                    this.audio.currentTime = this.currentTime;
                    this.audio.volume = this.volume / 100;
                    this.audio.playbackRate = this.rate;
                    this.url = this.audio.src;
                };

                this.audio.onerror = () => {
                    this.audioCheck();
                };

                this.audio.onstalled = () => {
                    this.audioCheck();
                };

                this.audio.oncanplay = () => {
                    if (!this.firstPositioned) {
                        this.firstPositioned = true;
                        this.audio.currentTime = this.currentTime;
                        this.audio.volume = this.volume / 100;
                        this.audio.playbackRate = this.rate;
                        if (page.actions.autoplay)
                            this.actionPlayPause();
                    }
                };
            })
            .catch(error => {
                if (error.message) {
                    let message = store.staticContent.open(error.message);
                    this.errorMessage = message;
                }
            });;
    }

    get _urlNarrator_() {
        return page.url([page.domain.name, 'livros', '-narradores', this.book.narrator_name]);
    }

    get _fileName_() {
        return page.application.parent.name + '.mp3';
    }

    get _duration_() {
        return this.formatTime(this.duration);
    }

    get _currentTime_() {
        return this.formatTime(this.audio.currentTime);
    }

    get _rangeValue_() {
        return Math.round((this.audio.currentTime / this.duration) * 100);
    }

    get _playPauseLabel_() {
        return this.paused ? "Reproduzir" : "Pausar";
    }

    get _playPauseSvg_() {
        if (this.paused)
            return "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><path d='M 16 0 a 16 16 0 0 1 0 32 a 16 16 0 0 1 0 -32 v 2 a 14 14 0 0 0 0 28 a 14 14 0 0 0 0 -28 z M 8 10 l 16 6 l -16 6 z'/></svg>";
        else
            return "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><path d='M 16 0 a 16 16 0 0 1 0 32 a 16 16 0 0 1 0 -32 v 2 a 14 14 0 0 0 0 28 a 14 14 0 0 0 0 -28 z M 8 8 h 6 v 16 h -6 z M 18 8 h 6 v 16 h -6 z'/></svg>";
    }

    actionPlayPause() {
        if (this.audio.paused) {
            this.audio.play();
            this.paused = false;
            this.timeUpdate();
        } else {
            this.audio.pause();
            this.paused = true;
        }
    }

    audioCheck() {
        if (this.paused)
            return;
        this.timeMonitor = this.audio.currentTime;
        this.storeConfiguration();
        setTimeout(() => {
            if (this.timeMonitor == 0 || this.timeMonitor !== audio.currentTime)
                return;

            this.audio.load();
            this.audio.currentTime = this.currentTime;
            this.audio.play();
        }, 500);
    }

    timeUpdate() {

        if (!this.audio || this.audio.paused)
            return;
        this.currentTime = this.audio.currentTime;
        this.storeConfiguration();
        setTimeout(() => {
            this.timeUpdate();
        }, 1000);
    }

    formatTime(time) {
        time = Math.floor(time);
        var seconds = time % 60;
        var totalMinutes = Math.floor((time - seconds) / 60);
        var minutes = totalMinutes % 60;
        var hours = Math.floor((totalMinutes - minutes) / 60);

        return hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
    }

    actionSeekArrowLeft() {
        this.audio.currentTime -= 10;
        this.currentTime = this.audio.currentTime;
    }

    actionSeekArrowRight() {
        this.audio.currentTime += 10;
        this.currentTime = this.audio.currentTime;
    }

    actionSeekPageUp() {
        this.audio.currentTime -= 60;
        this.currentTime = this.audio.currentTime;
    }

    actionSeekPageDown() {
        this.audio.currentTime += 60;
        this.currentTime = this.audio.currentTime;
    }

    actionSeekHome() {
        this.audio.currentTime -= 600;
        this.currentTime = this.audio.currentTime;
    }

    actionSeekCtrlHome() {
        this.audio.currentTime = 0;
        this.currentTime = this.audio.currentTime;
    }

    actionSeekEnd() {
        this.audio.currentTime += 600;
        this.currentTime = this.audio.currentTime;
    }

    actionSeekCtrlEnd() {
        this.audio.currentTime = this.audio.duration - 10;
        this.currentTime = this.audio.currentTime;
    }

    actionRateSlow() {
        if (this.rate > 0.5) {
            this.rate -= 0.25;
            this.audio.playbackRate = this.rate;
        }
    }

    actionRateFast() {
        if (this.rate < 2) {
            this.rate += 0.25;
            this.audio.playbackRate = this.rate;
        }
    }

    actionVolumeDown() {
        if (this.volume > 5) {
            this.volume -= 5;
            this.audio.volume = this.volume / 100;
        }
    }

    actionVolumeUp() {
        if (this.volume < 100) {
            this.volume += 5;
            this.audio.volume = this.volume / 100;
        }
    }

    handleRangeKeydown(event) {
        switch (event.key) {
            case "Enter":
            case " ":
                this.actionPlayPause();
                break;

            case "ArrowLeft":
                this.actionSeekArrowLeft();
                break;

            case "ArrowRight":
                this.actionSeekArrowRight();
                break;

            case "PageUp":
                this.actionSeekPageUp();
                break;

            case "PageDown":
                this.actionSeekPageDown();
                break;

            case "Home":
                this.actionSeekHome();
                break;

            case "End":
                this.actionSeekEnd();
                break;

            case "ArrowUp":
                this.actionVolumeUp();
                break;

            case "ArrowDown":
                this.actionVolumeDown();
                break;

            default:
                return;
        }
        event.preventDefault();
        event.stopPropagation();
    }

    disconnectedCallback() {
        if (this.audio)
            document.body.removeChild(this.audio);
        delete this.audio;
    }

    retrieveConfiguration() {
        var configuration = {};
        var serialized = localStorage.getItem('multileiturasLivro_audioConfiguration');
        if (serialized)
            configuration = unserialize(serialized);

        this.updateConfigurationList(configuration);
        this.configuration.name = this.name;
        this.configuration.title = this.book.text.title.pt.value;
        this.configuration.volume = configuration.volume || 100;
        this.configuration.rate = configuration.rate || 1;

        this.currentTime = this.configuration.currentTime || 0;
        this.rate = this.configuration.rate;
        this.volume = this.configuration.volume;
    }

    storeConfiguration() {
        this.configuration.currentTime = this.currentTime;
        this.configuration.rate = this.rate;
        this.configuration.volume = this.volume;
        this.configuration.tics++;
        this.configuration.listened = Math.ceil((this.configuration.tics / this.duration) * 100);
        this.configuration.updated = new Date().getTime();
        localStorage.setItem('multileiturasLivro_audioConfiguration', serialize(this.configuration));
    }

    updateConfigurationList(configuration) {
        var configurationList = [];
        var serialized = localStorage.getItem('multileiturasLivro_audioConfigurationList');
        if (serialized)
            configurationList = unserialize(serialized);
        if (configurationList.length > 20)
            configurationList.shift();

        this.setConfiguration(configurationList, configuration);
        this.findConfiguration(configurationList, this.name);
        localStorage.setItem('multileiturasLivro_audioConfigurationList', serialize(configurationList));
    }

    setConfiguration(configurationList, configuration) {
        if (!configuration.name)
            return;

        var data = {
            name: configuration.name,
            title: configuration.title || '',
            currentTime: configuration.currentTime,
            tics: configuration.tics,
            listened: configuration.listened,
            updated: configuration.updated
        };

        for (let i = 0; i < configurationList.length; i++) {
            if (configurationList[i].name === configuration.name) {
                configurationList[i] = data;
                return;
            }
        }

        configurationList.push(data);
    }

    findConfiguration(configurationList, name) {
        for (let i = 0; i < configurationList.length; i++) {
            if (configurationList[i].name === name) {
                this.configuration = configurationList[i];
                return;
            }
        }
        this.configuration.tics = 0;
        this.configuration.currentTime = 0;
    }

}
