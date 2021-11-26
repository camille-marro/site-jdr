<?php

class ControllerLore {
    private $view;
    private $loreManager;

    public function __construct($dataPost) {
        $this->loreManager = new LoreManager;

        if (!isset($_POST['chapitre'])) {
            $chapters = $this->loreManager->getAllChapters();
            $this->createView($chapters);
            return;
        }
        $this->createView(NULL);
    }

    private function createView($chapters) {
        $this->view = new View('Lore');
        $this->view->generateView(Array($chapters));
    }
}