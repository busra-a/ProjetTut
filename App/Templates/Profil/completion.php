
<div class="border-top container py-4">
    <h4>Compléter mon profil</h4>

    <!--collecter les informations manquantes dans le profil de l'utilisateur SESSION
    faire un if à chaque fois
    on remplit le conteneur si l'info a déjà été donnée par l'utilisateur-->
    <form class="py-4">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                Choix du format des cours
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><button class="dropdown-item" type="button">Vidéo</button></li>
                <li><button class="dropdown-item" type="button">Textuel</button></li>
            </ul>
        </div>
    </form>

</div>

<?php
include_once "./Templates/Profil/e-portfolio.php";
?>
