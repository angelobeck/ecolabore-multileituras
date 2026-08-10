<?php

class eclCom_multileituras_modLevelUp extends eclCom
{
    public string $url;
    public array | string $label;
    public bool $showModule = false;

    public function connectedCallback(): void
    {
        $parent = $this->page->application->parent;
        if ($parent->applicationName === 'multileituras')
            return;

        $this->url = $this->page->url($parent->path);
        $this->label = $parent->data['text']['title'] ?? 'um nível acima';
        $this->showModule = true;

    }

}
