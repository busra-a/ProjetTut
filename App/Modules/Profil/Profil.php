
<?php
require_once './Modules/Profil/cont_Profil.php';
class Profil {
    private $action;
    private $controleur;

    public function __construct(){
        $this->controleur = new ContProfil();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction(){
        if(!isset($_GET['action'])){
            $_GET['action'] = "eportfolio";
        }
        return $_GET["action"];
    }

    public function render($toDO){
        switch ($toDO){
            case "profil":
                $this->controleur->profil();
                break;
            default:
                echo"accès interdit";
                break;
        }
    }
}
