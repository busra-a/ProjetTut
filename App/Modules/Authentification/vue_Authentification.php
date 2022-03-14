<?php
require_once "./vue_generique.php";

class VueAuthentification extends VueGenerique{

    public function __construct(){}

    public function inscriptionconnexion(){
        $this->getAffichage('Authentification/inscriptionconnexion.php');
    }

    public function profile(){
        $this->getAffichage('Authentification/profil.php');
    }

    public function connexioninscription(){
        $this->getAffichage('Authentification/inscriptionconnexion.php');
    }

}
