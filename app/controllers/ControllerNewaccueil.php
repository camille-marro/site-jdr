<?php

class ControllerNewaccueil
{
    private $View;

    public function __construct($url)
    {
        //Lance la méthode qui affiche l'accueil.
        $this->Accueil();
    }

    private function Accueil()
    {
        //Affiche l'accueil avec les posts récupérés au-dessus.
        $this->View = new View('Newaccueil');
        $this->View->generateView(array(NULL));
    }
}
