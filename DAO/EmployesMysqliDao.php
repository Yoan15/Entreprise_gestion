<?php

    class EmployesMysqliDao{

    /*Connexion*/

    function connection(){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        return $mysqli;
    }

    /*ajout*/

    static function addEmployes($employes){
        $mysqli = connection();
        $stmt = $mysqli->prepare("INSERT INTO emp2 (NOEMP, NOM, PRENOM, EMPLOI, SUP, EMBAUCHE, SAL, COMM, NOSERV) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        $noemp = $employes->getNoemp();
        $nom = $employes->getNom();
        $prenom = $employes->getPrenom();
        $poste = $employes->getPoste();
        $sup = $employes->getSup();
        $embauche = $employes->getEmbauche();
        $sal= $employes->getSal();
        $comm = $employes->getComm();
        $serv = $employes->getNoserv();
        $stmt->bind_param("isssisddi", $noemp, $nom, $prenom, $poste, $sup, $embauche, $sal, $comm, $serv);
        $stmt->execute();
        $mysqli->close();
    }

    /*supprimer*/

    static function supprimeEmploye(int $noemp){
        $mysqli = connection();
        $stmt = $mysqli->prepare("DELETE FROM emp2 WHERE NOEMP=?");
        $stmt->bind_param("i", $noemp);
        $stmt->execute();
        $mysqli->close();
        
    }

    /*Modif*/
    
    static function modifEmployes($employes){
        $mysqli = connection();
        $stmt = $mysqli->prepare("UPDATE emp2 SET NOEMP=?, NOM=?, PRENOM=?, EMPLOI=?, SUP=?, EMBAUCHE=?, SAL=?, COMM=?, NOSERV=? WHERE NOEMP=?");
        // if ($stmt === false) {
        //     printf("Message d'erreur : %s\n", $mysqli->error);
        //    die();
        //    }
        $noemp = $employes->getNoemp();
        $nom = $employes->getNom();
        $prenom = $employes->getPrenom();
        $poste = $employes->getPoste();
        $sup = $employes->getSup();
        $embauche = $employes->getEmbauche();
        $sal= $employes->getSal();
        $comm = $employes->getComm();
        $serv = $employes->getNoserv();
        $stmt->bind_param("isssisddii", $noemp, $nom, $prenom, $poste, $sup, $embauche, $sal, $comm, $serv, $noemp);
        $stmt->execute();
        $mysqli->close();
    }

    /*Détail*/

    // static function detailEmploye(int $noemp){
    //     $mysqli = connection();
    //     $stmt = $mysqli->prepare('SELECT * FROM emp2 WHERE NOEMP=?');
    //     $stmt->bind_param("i", $noemp);
    //     $stmt->execute();
    //     $rs = $stmt->get_result();
    //     $data = $rs->fetch_row(MYSQLI_ASSOC);
    //     $mysqli->close();
    //     return $data;
    // }

    /*Recherche*/

    // function rechercheSup(){
    //     $mysqli = connection();
    //     $stmt = $mysqli->prepare('SELECT DISTINCT SUP FROM emp2');
    //     $stmt->execute();
    //     $rs = $stmt->get_result();
    //     $data = $rs->fetch_all(MYSQLI_ASSOC);
    //     return $data;
    // }

    }
?>