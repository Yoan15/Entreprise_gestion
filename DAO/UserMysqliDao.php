<?php

    class UserMysqliDao{

        static function addUser(string $username, string $password){
            $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
            $stmt = $mysqli->prepare("INSERT INTO profil (id, username, mdp, profil) VALUES (NULL, ?, ?, 'utilisateur')");
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            $mysqli->close();
        }
    
        static function searchUserByMail(string $username){
            $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
            $stmt = $mysqli->prepare("select * from profil where username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }
    }

?>