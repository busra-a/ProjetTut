<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "./connexion.php";

if (isset($_GET['module'])) {
    $module = $_GET['module'];
} else {
    $module = "Accueil";
}

if (!in_array($module, ["Accueil", "Authentification", "Profil"])) {
    die("Unauthorized");
}

require_once "./Modules/$module/$module.php";

Connexion::initConnexion();
if ($module == "Article") {
    new $module($module); // à constructeur on passe la chaine "Article"
} else
    new $module();
?>