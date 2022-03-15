<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['module'])) {
    $module = $_GET['module'];
} else {
    $module = "Accueil";
}

if (!in_array($module, ["Accueil", "Authentification", "Profil"])) {
    die("Unauthorized");
}

require_once "./Modules/$module/$module.php";

if ($module == "Article") {
    new $module($module); // à constructeur on passe la chaine "Article"
} else
    new $module();
?>