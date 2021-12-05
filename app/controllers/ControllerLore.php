<?php

class ControllerLore {
    private $view;
    private $loreManager;

    public function __construct($dataPost) {
        $this->loreManager = new LoreManager;

        $chapters = $this->loreManager->getAllChapters();
        $this->createView($chapters);
    }

    private function createView($chapters) {
        $this->view = new View('Lore');
        $this->view->generateView(array($chapters));
    }
}