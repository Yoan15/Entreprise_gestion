<?php

    function addUser(string $username, string $password){
        $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
        $stmt = $mysqli->prepare("INSERT INTO profil (id, username, mdp) VALUES (NULL, ?, ?)");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $mysqli->close();
    }

    function userConnect(string $username, string $mdp){
        $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
        $stmt = $mysqli->prepare("SELECT * FROM profil WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
        var_dump($data);
        $hash = $data["mdp"];
        $rs->free();
        $mysqli->close();
    }

?>