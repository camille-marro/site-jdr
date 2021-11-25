<?php

require_once "public/views/templates/views.php";

class Router
{
    private $controllerName;
    private $viewName;

    public function routeRequest()
    {
        //Charge les classes par leur nom.
        try {
            //Charge les classes des Models
            spl_autoload_register(function ($class) {
                $BaseDIR = 'app/models';
                $listDir = scandir(realpath($BaseDIR));
                if (isset($listDir) && !empty($listDir)) {
                    foreach ($listDir as $listDirkey => $subDir) {
                        $file = $BaseDIR . DIRECTORY_SEPARATOR . $subDir . DIRECTORY_SEPARATOR . $class . '.php';
                        if (file_exists($file)) {
                            require $file;
                        }
                    }
                }
            });

            $url = '';
            $dataPost = '';

            //Vérification de la variable GET["url"] qui récupère le chemin voulu et affiche le bon Controller
            if (isset($_GET['url'])) {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                //Récupère les requêtes POST et les FILES s'il y en a.
                if ($_SERVER['REQUEST_METHOD'] === 'POST') $dataPost = $_POST;
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES)) $dataPost["Files"] = $_FILES;
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller" . $controller;
                $controllerFile = "app/controllers/" . $controllerClass . ".php";

                //Si le Controller existe alors on le lance sinon on est redirigé vers la page d'erreur.
                if (file_exists($controllerFile)) {
                    require_once "$controllerFile";
                    $this->controllerName = new $controllerClass($url, $dataPost);
                } else {
                    throw new Exception('La page demandée est introuvable');
                }

            } else {
                require_once('app/controllers/ControllerAccueil.php');
                $this->controllerName = new ControllerAccueil($url);
            }
        } //Affichage de la page Erreur.
        catch (Exception $e) {
            $errorMessage = $e->getMessage();
            $this->viewName = new View("Erreur");
            $this->viewName->generateView(array('errorMessage' => $errorMessage));
        }
    }
}
