<?php

include 'crud_user.php';

if (!empty($_POST)){
    if (isset($_POST["username"]) && !empty($_POST["username"])
    && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
        $username = $_POST["username"]?$_POST["username"]: "NULL";
        $mdp = $_POST["mdp"]?$_POST["mdp"]: "NULL";
        password_verify($mdp, $hash);
        userConnect($username, $mdp);
    }
}

?>