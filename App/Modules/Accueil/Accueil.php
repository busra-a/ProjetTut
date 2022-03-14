
<?php
require_once './Modules/Accueil/cont_Accueil.php';
class Accueil {
    private $action;
    private $controleur;

    public function __construct(){
        $this->controleur = new ContAccueil();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction(){
        if(!isset($_GET['action'])){
            $_GET['action'] = "accueil";
        }
        return $_GET["action"];
    }

    public function render($toDO){
        switch ($toDO){
            default:
                $this->controleur->accueil();
                break;
        }
    }
}
