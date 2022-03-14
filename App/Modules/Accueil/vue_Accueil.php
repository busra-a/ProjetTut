<?php
require_once "./vue_generique.php";

class VueAccueil extends VueGenerique{

    public function __construct(){}

    public function accueil(){
        $this->getAffichage('Accueil/accueil.php');
    }

}
