<?php

    require_once ("../class/Employe/UserException.php");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class UserMysqliDao{

        static function addUser(string $username, string $password){
            try{
                $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
                $stmt = $mysqli->prepare("INSERT INTO profil (id, username, mdp, profil) VALUES (NULL, ?, ?, 'utilisateur')");
                $stmt->bind_param('ss', $username, $password);
                $stmt->execute();
            }catch(mysqli_sql_exception $e){
                throw new UserException($e->getMessage(), $e->getCode());
            }finally{
                $mysqli->close();
            }
        }
    
        static function searchUserByMail(string $username){
            try{
                $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
                $stmt = $mysqli->prepare("select * from profil where username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $rs = $stmt->get_result();
                $data = $rs->fetch_array(MYSQLI_ASSOC);
                $rs->free();
                return $data;
            }catch(mysqli_sql_exception $e){
                throw new UserException($e->getMessage(), $e->getCode());
            }finally{
                $mysqli->close();
            }
            
        }
    }

?>