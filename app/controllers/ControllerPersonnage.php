<?php

class ControllerPersonnage {
    private $view;
    private $personnageManager;

    public function __construct($dataPost)
    {
        $this->personnageManager = new PersonnageManager;

        //check de l'existence de la session pour la gestion des erreurs
        if(!isset($_SESSION)) {
            session_start();
        }

        if (isset($_POST['id-personnage'])) {
            $inputStream = $_POST['id-personnage'];
            if (!$this->personnageManager->checkInputStream($inputStream)) {
                $_SESSION['error'] = 'Typographie incorrecte';
                $this->returnToAccueil();
            } else {
                $nb_occu = strlen($inputStream);
                if(preg_match('/[0-9]{' . $nb_occu . '}/', $inputStream)) {
                    $raw_id_personnage = $this->personnageManager->getPersonnageFromID($inputStream);
                    if ($raw_id_personnage == 'erreur' || $raw_id_personnage == NULL) {
                        $_SESSION['error'] = 'ID inexistant';
                        $this->returnToAccueil();
                        return;
                    } else {
                        $id_personnage = $raw_id_personnage['ID'];
                    }
                } else {
                    $raw_id_personnage = $this->personnageManager->getIDPersonnageFromNom($inputStream);
                    if (count($raw_id_personnage) == 0) {
                        $_SESSION['error'] = 'Aucun personnage n\'a le nom : ' . $inputStream;
                        $this->returnToAccueil();
                        return;
                    } else if (count($raw_id_personnage) > 1) {
                        $_SESSION['error'] = 'Plusieurs personnages ont le nom : ' . $inputStream;
                        $this->returnToAccueil();
                        return;
                    } else {
                        $id_personnage = $raw_id_personnage[0]['ID'];
                    }
                }
                if (isset($_POST['glods'])) {
                    if(!preg_match('/[0-9]/', $_POST['glods'])) {
                        $this->returnToAccueil();
                        return;
                    }
                    $this->personnageManager->refresh_glods($_POST['glods'], $id_personnage);
                }
                $personnage = $this->personnageManager->getPersonnageFromID($id_personnage);
                $competences = $this->personnageManager->getCompetencesFromID($id_personnage);
                $items = $this->personnageManager->getItemsFromID($id_personnage);
                $this->showPersonnage($personnage, $competences, $items);
            }
        }
    }

    private function showPersonnage($personnage, $competences, $items) {
        $this->view = new View('Personnage');
        $this->view->generateView(array($personnage, $competences, $items));
    }

    private function returnToAccueil() {
        header('Location: /');
    }
}