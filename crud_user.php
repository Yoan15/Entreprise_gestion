<?php

    function addUser(string $username, string $password, string $profil){
        $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
        $stmt = $mysqli->prepare("INSERT INTO profil (id, username, mdp, profil) VALUES (NULL, ?, ?, ?)");
        $stmt->bind_param('sss', $username, $password, $profil);
        $stmt->execute();
        $mysqli->close();
    }

    function searchUserByMail(string $username){
        $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
        $stmt = $mysqli->prepare("SELECT mdp FROM profil WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $data;
    }

?>