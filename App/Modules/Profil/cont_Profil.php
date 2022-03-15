<?php
require_once "./Modules/Profil/vue_Profil.php";
require_once "./Modules/Profil/modele_Profil.php";

class ContProfil{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleProfil();
        $this->vue = new VueProfil();
    }

    public function profil(){
        $this->vue->nouvelleFormation();
        //$this->vue->suggestionsperso();
    }

}