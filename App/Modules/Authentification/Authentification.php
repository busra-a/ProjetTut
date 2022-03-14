
<?php
require_once './Modules/Authentification/cont_Authentification.php';
class Authentification {
    private $action;
    private $controleur;

    public function __construct(){
        $this->controleur = new ContAuthentification();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction(){
        if(!isset($_GET['action'])){
            $_GET['action'] = "inscription";
        }
        return $_GET["action"];
    }

    public function render($toDO){
        switch ($toDO){
            case "connexion":
                $this->controleur->connexion();
                break;
            default:
                $this->controleur->connexioninscription();
                break;
        }
    }
}
