<?php

class ServiceMysqliDao{

    /*Connexion*/

    public function connection(){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        return $mysqli;
    }

    /*ajout*/

    static function addService(Service $service){
        $mysqli = connection();
        $stmt = $mysqli->prepare("INSERT INTO serv2 (NOSERV, SERV, VILLE) VALUES (?,?,?)");
        $noserv= $service->getNoserv();
        $serv= $service->getServ();
        $ville= $service->getVille();
        $stmt->bind_param("iss", $noserv, $serv, $ville);
        $stmt->execute();
        $mysqli->close();
    }

    /*modif*/

    static function modifService(Service $service){
        $mysqli = connection();
        $stmt = $mysqli->prepare("UPDATE serv2 SET NOSERV=?, SERV=?, VILLE=? WHERE NOSERV=?");
        $noserv= $service->getNoserv();
        $serv= $service->getServ();
        $ville= $service->getVille();
        $stmt->bind_param("issi", $noserv, $serv, $ville, $noserv);
        $stmt->execute();
        $mysqli->close();
    }

    /*supprimer*/

    static function supprService(int $noserv){
        $mysqli = connection();
        $stmt = $mysqli->prepare("DELETE FROM serv2 WHERE NOSERV=?");
        $stmt->bind_param("i", $noserv);
        $stmt->execute();
        $mysqli->close();
        
    }
}
?>