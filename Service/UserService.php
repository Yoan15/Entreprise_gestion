<?php

    include_once '../DAO/UserMysqliDao.php';
    require_once '../class/Employe/ServiceException.php';

    class UserService extends UserMysqliDao {
        static function checkIfUserExists(string $username){
            $data=parent::searchUserByMail($username);
            return $data;
        }

        static function addUser(string $username, string $password){
            try{
                parent::addUser($username, $password);
            }catch(UserException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function cryptPassword($mdp){
            $password = password_hash($mdp, PASSWORD_DEFAULT);
            return $password;
        }

        static function checkUserPassword($mdp, $data){
            $goodPassword = password_verify($mdp, $data["mdp"]);
            return $goodPassword;
        }
    }

?>