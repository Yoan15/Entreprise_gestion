<?php

    class EmployesMysqliDao{

    /*ajout*/

    static function addEmployes($employes){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
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
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        $stmt = $mysqli->prepare("DELETE FROM emp2 WHERE NOEMP=?");
        $stmt->bind_param("i", $noemp);
        $stmt->execute();
        $mysqli->close();
        
    }

    /*Modif*/
    
    static function modifEmployes($employes){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
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
        $sal = $employes->getSal();
        $comm = $employes->getComm();
        $serv = $employes->getNoserv();
        $stmt->bind_param("isssisddii", $noemp, $nom, $prenom, $poste, $sup, $embauche, $sal, $comm, $serv, $noemp);
        $stmt->execute();
        $mysqli->close();
    }

    /*Recherche Employes*/
    static function rechercheEmploye(){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        $stmt =$mysqli->prepare("SELECT * FROM emp2");
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $mysqli->close();
        return $data;
    }

    /*Détail*/

    static function detailEmploye(int $noemp){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        $stmt = $mysqli->prepare('SELECT * FROM emp2 WHERE NOEMP=?');
        $stmt->bind_param("i", $noemp);
        $stmt->execute();
        $rs = $stmt->get_result();
        $detail = $rs->fetch_array(MYSQLI_ASSOC);
        $mysqli->close();
        return $detail;
    }

    /*Recherche*/

    static function rechercheSup(){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        $stmt = $mysqli->prepare("SELECT DISTINCT SUP FROM emp2");
        $stmt->execute();
        $rs = $stmt->get_result();
        $donnee = $rs->fetch_all(MYSQLI_ASSOC);
        $mysqli->close();
        return $donnee;
    }

    }
?>