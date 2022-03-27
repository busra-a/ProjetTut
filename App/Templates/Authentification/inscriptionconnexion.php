<div class="bg-warning">
    <?php if(isset($_SESSION['erreur']) && !empty($_SESSION['erreur']) ) {
        echo $_SESSION['erreur'];
        unset($_SESSION['erreur']);
    }?>
</div>

<div class="container p-4">
    <div class="row justify-content-around">
        <div class="col-4">
            <h4 class="couleur-authentification">Connexion</h4>
            <form class="forms" action='index.php?module=Authentification&action=connexionForm' method='post'>
                <div class='row justify-content-around align-items-center'>
                    <div class=''>
                        <div class='form-floating mb-3'>
                            <input name='mail' type='email' class='form-control' id='mail' placeholder='Mail'>
                            <label for='mail'>Mail</label>
                        </div>
                        <div class='form-floating mb-3'>
                            <input name='password' type='password' class='form-control' id='floatingPassword' placeholder='Mot de passe'>
                            <label for='floatingPassword'>Mot de passe</label>
                        </div>
                        <div class='col-12'>
                            <button class='btn btn-primary' type='submit'>Se connecter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-4 border-start">
            <h4 class="couleur-authentification">Inscription</h4>
            <form class="forms" action='index.php?module=Authentification&action=inscriptionForm' method='post'>
                <div class='row justify-content-around align-items-center'>
                    <div class=''>
                        <div class='form-floating mb-3'>
                            <input name='nom' type='text' class='form-control' id='nom' placeholder='Nom'>
                            <label for='nom'>Nom</label>
                        </div>
                        <div class='form-floating mb-3'>
                            <input name='prenom' type='text' class='form-control' id='prenom' placeholder='prenom'>
                            <label for='prenom'>Préom</label>
                        </div>
                        <div class='form-floating mb-3'>
                            <input name='pseudo' type='text' class='form-control' id='pseudo' placeholder='Pseudo'>
                            <label for='pseudo'>Pseudo</label>
                        </div>
                        <div class='form-floating mb-3'>
                            <input name='mail' type='email' class='form-control' id='mail' placeholder='Mail'>
                            <label for='floatingPassword'>Mail</label>
                        </div>
                        <div class='form-floating mb-3'>
                            <input name='password' type='password' class='form-control' id='floatingPassword' placeholder='Mot de passe'>
                            <label for='floatingPassword'>Mot de passe</label>
                        </div>
                        <div class='col-12'>
                            <button class='btn btn-primary' type='submit'>S'inscrire</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>