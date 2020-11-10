<?php

    include_once 'DAO/UserMysqliDao.php';

    class UserService extends UserMysqliDao {
        static function CheckIfUserExists(string $username) {
            $data=parent::searchUserByMail($username);
            return $data;
        }

        static function addUser(string $username, string $password){
            parent::addUser($username, $password);
        }

        static function cryptPassword($mdp){
            $password = password_hash($mdp, PASSWORD_DEFAULT);
            return $password;
        }

        // static function CheckUserPassword($mdp, $data){
        //     password_verify($mdp, $data["mdp"]);
        // }
    }

?>