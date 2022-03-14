<?php

require_once './Modules/Cours/cont_Cours.php';

class Cours
{
    private $action;
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContAuthentification();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction()
    {
        if (!isset($_GET['action'])) {
            $_GET['action'] = "inscription";
        }
        return $_GET["action"];
    }

    public function render($toDO)
    {
        switch ($toDO) {
            case "cours":
                $this->controleur->cours();
                break;
            case "module":
                $this->controleur->module();
                break;
            case "revisions":
                $this->controleur->revisions();
                break;
            default:
                echo"accès interdit";
                break;
        }
    }
}
