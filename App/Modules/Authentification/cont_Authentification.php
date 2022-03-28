<?php
require_once "./Modules/Authentification/vue_Authentification.php";
require_once "./Modules/Profil/cont_Profil.php";

class ContAuthentification{
    private $modele;
    private $vue;

    public function __construct(){
        $this->vue = new VueAuthentification();
        $this->controleurProfil = new VueProfil();
    }

    public function connexioninscription(){
        $this->vue->connexioninscription();
    }

    public function connexionform(){
        if ( !isset($_POST['mail']) or !isset($_POST['password']) or  empty($_POST['mail']) or empty($_POST['password'])) {
            $_SESSION["erreur"] = "Tous les champs doivent être remplis !";
            if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                header("Location: ".$_SERVEUR['HTTP_REFERER']);
                exit();
            }else{
                header("Location: index.php?module=Authentification&action=connexioninscription");
            }
        } else {
            $mail = htmlspecialchars($_POST['mail']);
            $password = htmlspecialchars($_POST['password']);

            if(empty($user)){
                $_SESSION["erreur"] = "Ce pseudo n'existe pas !";
                if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                    header("Location: ".$_SERVEUR['HTTP_REFERER']);
                    exit();
                }else{
                    header("Location: index.php?module=Authentification&action=connexioninscription");
                }
            } else {
                $verifPassword = password_verify($password,$user->mdp);
                if($verifPassword){
                    if(session_status()== PHP_SESSION_DISABLED)
                        session_start();
                    $_SESSION['mail'] = $mail;
                    $_SESSION['id']=$id;
                    $this->controleurProfil->profil();
                } else{
                    $_SESSION["erreur"] = "Votre mot de passe est incorrect";
                    if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                        header("Location: ".$_SERVEUR['HTTP_REFERER']);
                        exit();
                    }else{
                        header("Location: index.php?module=Authentification&action=connexioninscription");
                    }
                }

            }
        }
    }

    public function inscriptionForm(){

        if (!isset($_POST['nom']) or !isset($_POST['email']) or !isset($_POST['prenom']) or !isset($_POST['pseudo']) or !isset($_POST['password']) or empty($_POST['nom']) or empty($_POST['email']) or empty($_POST['password'])) {

            $_SESSION["erreur"] = "Tous les champs doivent être remplis !";
            if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                header("Location: ".$_SERVEUR['HTTP_REFERER']);
                exit();
            }else{
                header("Location: index.php?module=Authentification&action=connexioninscription");
            }
        } else {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $pseudo =htmlspecialchars( $_POST['pseudo']);
            $password =htmlspecialchars($_POST['password']);
            if(empty($user)){
                $password = password_hash($password,PASSWORD_BCRYPT);
                $data = array('nom'=>$nom,'prenom'=>$prenom,'pseudo'=>$pseudo,'email'=>$email,'password'=>$password);
                $this->controleurProfil->profil();
            } else {
                $_SESSION["erreur"] = "L'email ou le pseudo entré est déja utilisé";
                if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                    header("Location: ".$_SERVEUR['HTTP_REFERER']);
                    exit();
                }else{
                    header("Location: index.php?module=Authentification&action=connexioninscription");
                }
            }
        }
    }

    public function deconnexion(){
        if(!empty($_SESSION['pseudo'])){
            unset($_SESSION['pseudo']);
            $this->vue->connexion();
        }
        include_once "connexion.php";
    }

}