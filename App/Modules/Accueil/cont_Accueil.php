<?php
require_once "./Modules/Accueil/vue_Accueil.php";
require_once "./Modules/Accueil/modele_Accueil.php";

class ContAccueil{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleAccueil();
        $this->vue = new VueAccueil();
    }

    public function accueil(){
        $this->vue->accueil();
    }

}