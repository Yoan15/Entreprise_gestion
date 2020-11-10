<?php
session_start();

include_once 'Service/UserService.php';

/*Inscription*/

if (isset($_GET["action"]) && $_GET["action"] == "inscription" && !empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = $_POST["username"];
        $mdp = $_POST["mdp"];
        $data = UserService::CheckIfUserExists($username);
        if (($_POST["username"]) == ($data["username"])) {
            header('Location: formInscription.php?error=mailused');
        } else {
        $password = UserService::cryptPassword($mdp);
        UserService::addUser($username, $password);
        header("Location: formConnexion.php");
        }
    }
}

/*Connexion*/

if (isset($_GET["action"]) && $_GET["action"] == "connexion" && !empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = $_POST["username"];
        $mdp = $_POST["mdp"];
        $data = UserService::CheckIfUserExists($username);
        if (password_verify($mdp, $data["mdp"])) {
            $_SESSION["username"] = $username;
            $_SESSION["profil"] = $data["profil"];
            header("Location: tableau_employe.php");
        }else{
            header("Location: formConnexion.php?error=warning");
        }
    }
}
?>