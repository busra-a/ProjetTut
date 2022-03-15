<?php
require_once "./vue_generique.php";

class VueProfil extends VueGenerique{

    public function __construct(){}

    public function nouvelleFormation(){
        $this->getAffichage('Profil/nouvelleFormation.php');
    }

    public function completion(){
        $this->getAffichage('Profil/completion.php');
    }

    public function eportfolio(){
        $this->getAffichage('Profil/e-portfolio.php');
    }

    public function suggestionsperso(){
        $this->getAffichage('Profil/suggestionsperso.php');
    }
}
