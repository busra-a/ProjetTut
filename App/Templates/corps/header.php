<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Spac-el</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Assets/css/style.css">
</head>

<body class="text-black .test">
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
<div id="bodyContent">
