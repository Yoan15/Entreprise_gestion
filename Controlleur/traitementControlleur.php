<?php
session_start();

include_once '../Service/UserService.php';

/*Inscription*/

if (isset($_GET["action"]) && $_GET["action"] == "inscription" && !empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = htmlentities($_POST["username"]);
        $mdp = htmlentities($_POST["mdp"]);
        $data = UserService::checkIfUserExists($username);
        if(($_POST["username"]) == ($data["username"])) {
            header('Location: ../formInscription.php?error=mailused');
        } else {
        $password = UserService::cryptPassword($mdp);
        try{
            UserService::addUser($username, $password);
        }catch(ServiceException $e){
            
        }
        header("Location: ../formConnexion.php");
        }
    }
}

/*Connexion*/

if (isset($_GET["action"]) && $_GET["action"] == "connexion" && !empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = htmlentities($_POST["username"]);
        $mdp = htmlentities($_POST["mdp"]);
        $data = UserService::checkIfUserExists($username);
        if($goodPassword = UserService::checkUserPassword($mdp, $data)) {
            $_SESSION["username"] = $username;
            $_SESSION["profil"] = $data["profil"];
            header("Location: tableau_employeControlleur.php");
        }else{
            header("Location: ../formConnexion.php?error=warning");
        }
    }
}
?>