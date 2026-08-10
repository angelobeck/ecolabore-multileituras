<?php

class eclCom_multileituras_modTitle extends eclCom
{
    public array|string $title;

    public function connectedCallback(): void
    {
        $this->title = $this->page->application->data['text']['title'] ?? $this->page->application->name;
    }
}
