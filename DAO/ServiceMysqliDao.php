<?php

class ServiceMysqliDao{

    /*ajout*/

    static function addService(Service $service){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
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
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
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
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        $stmt = $mysqli->prepare("DELETE FROM serv2 WHERE NOSERV=?");
        $stmt->bind_param("i", $noserv);
        $stmt->execute();
        $mysqli->close();
        
    }

    static function detailService(int $noserv){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        $stmt = $mysqli->prepare('SELECT * FROM serv2 WHERE NOSERV=?');
        $stmt->bind_param("i", $noserv);
        $stmt->execute();
        $rs = $stmt->get_result();
        $detail = $rs->fetch_array(MYSQLI_ASSOC);
        $mysqli->close();
        return $detail;
    }

    /*Recherche services*/
    static function rechercheService(){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        $stmt=$mysqli->prepare('SELECT * FROM serv2');
        $stmt->execute();
        $rs=$stmt->get_result();
        $data=$rs->fetch_all(MYSQLI_ASSOC);
        $mysqli->close();
        return $data;
    }
}
?>