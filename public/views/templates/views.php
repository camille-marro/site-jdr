<?php

class View
{
    private $File;
    private $Title;

    public function __construct($Action) {
        $this->File = 'public/views/view'.$Action.'.php';
        $this->Title = $Action;
    }

    //Génération de la vue.
    public function generateView($data) {
        //Récupération des données du fichier vue en question.
        $Content = $this->generateFile($this->File, $data);

        //Création de la liste des CSS.
        $CSS = array('main', 'header', strtolower($this->Title));

        //Création de la vue avec le Template (Données + CSS).
        $View = $this->generateFile('public/views/templates/main.php', array('Title' => $this->Title, 'Content' => $Content, 'CSS' => $CSS));

        echo $View;
    }

    //Création et affichage de la vue.
    private function generateFile($File, $data) {
        //Affichage de la vue si le fichier correspondant existe.
        if(file_exists($File)) {
            if(!is_null($data)) extract($data);
            ob_start();
            require_once "$File";
            return ob_get_clean();
        } else {
            throw new Exception("Fichier $File introuvable.");
        }
    }
}