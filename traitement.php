<?php

include 'crud_user.php';

/*Inscription*/

if (isset($_GET["action"]) && $_GET["action"] == "inscription" && !empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = $_POST["username"];
        $mdp = $_POST["mdp"];
        $profil = "utilisateur";
        $password = password_hash($mdp, PASSWORD_DEFAULT);
        addUser($username, $password, $profil);
        header("Location: formConnexion.php");
    }
}

/*Connexion*/

if (isset($_GET["action"]) && $_GET["action"] == "connexion" && !empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = $_POST["username"];
        $mdp = $_POST["mdp"];
        $data = searchUserByMail($username);
        if (password_verify($mdp, $data["mdp"])) {
            session_start();
            $_SESSION["username"] = $username;
            header("Location: tableau_employe.php");
        }else{
            header("Location: formConnexion.php");
        }
    }
}
?>