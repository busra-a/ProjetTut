<!DOCTYPE html>

<html lang="fr" class="mh-100">

<head>
    <meta charset="UTF-8">
    <title>Spac-el</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./Assets/css/bootstrap.css">
    <link rel="stylesheet" href="./Assets/css/style.css">
</head>

<body class="text-black">
<div class="d-flex flex-column min-vh-100">
    <header id="header">

        <nav class="navbar navbar-expand-lg border-bottom p-4">
            <div class="container-fluid">
                <a id="lien_logo" href="index.php?module=Accueil">
                    <img id="img_logo" src="./Templates/Images/logo.png" alt="Logo du site"
                         class="w-14 h-auto"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" class="background-nav">
                        <li class="nav-item">
                            <a class="couleurs-nav-menu nav-link active" aria-current="page"
                               href="index.php?module=Formations&action=cours">Cours</a>
                        </li>
                        <?php if (!isset($_SESSION['pseudo'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link couleur-authentification"
                                   href="index.php?module=Authentification&action=inscription">Inscription / Connexion</a>
                            </li>
                        <?php } else { ?>

                            <li class="nav-item couleurs-nav-authentification">
                                <a class=" nav-link" href="index.php?module=Profil&action=profil">Profil</a>
                            </li>
                            <li class="nav-item couleurs-nav-authentification">
                                <a class="nav-link"
                                   href="index.php?module=Authentification&action=deconnexion">Déconnexion</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="bodyContent" class="container">