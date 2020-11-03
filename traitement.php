<?php

include 'crud_user.php';

/*Inscription*/

if (isset($_GET["action"]) && $_GET["action"] == "inscription" && !empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = $_POST["username"]?$_POST["username"]: "NULL";
        $mdp = $_POST["mdp"]?$_POST["mdp"]: "NULL";
        $password = password_hash($mdp, PASSWORD_DEFAULT);
        addUser($username, $password);
    }
}

/*Connexion*/

if (isset($_GET["action"]) && $_GET["action"] == "connexion" && !empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = $_POST["username"]?$_POST["username"]: "NULL";
        $mdp = $_POST["mdp"]?$_POST["mdp"]: "NULL";
        userConnect($username, $mdp);
        if (password_verify($mdp, $hash)) {
            echo "mot de passe correct";
        }else{
            echo "mot de passe ou email incorrect";
        }
    }
}
?>