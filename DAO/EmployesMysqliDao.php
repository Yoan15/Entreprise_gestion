<?php

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class EmployesMysqliDao{

    /*ajout*/

    static function addEmployes($employes){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        } catch (mysqli_sql_exception $connexion){
            
        }
        try{
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
        } catch (mysqli_sql_exception $insert){
            
        }
    }

    /*supprimer*/

    static function supprimeEmploye(int $noemp){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        } catch (mysqli_sql_exception $connexion){
            
        }
        try{
            $stmt = $mysqli->prepare("DELETE FROM emp2 WHERE NOEMP=?");
            $stmt->bind_param("i", $noemp);
            $stmt->execute();
            $mysqli->close();
        } catch (mysqli_sql_exception $delete){
            
        }
    }

    /*Modif*/
    
    static function modifEmployes($employes){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        } catch (mysqli_sql_exception $connexion){
            
        }
        $stmt = $mysqli->prepare("UPDATE emp2 SET NOEMP=?, NOM=?, PRENOM=?, EMPLOI=?, SUP=?, EMBAUCHE=?, SAL=?, COMM=?, NOSERV=? WHERE NOEMP=?");
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
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        } catch (mysqli_sql_exception $connexion){
            
        }
        try{
            $stmt =$mysqli->prepare("SELECT * FROM emp2");
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $data;
        } catch (mysqli_sql_exception $recherche){

        }
    }

    /*Détail*/

    static function detailEmploye(int $noemp){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        } catch (mysqli_sql_exception $connexion){
            
        }
        try{
            $stmt = $mysqli->prepare('SELECT * FROM emp2 WHERE NOEMP=?');
            $stmt->bind_param("i", $noemp);
            $stmt->execute();
            $rs = $stmt->get_result();
            $detail = $rs->fetch_array(MYSQLI_ASSOC);
            $mysqli->close();
            return $detail; 
        } catch (mysqli_sql_exception $detail){

        }
    }

    /*Recherche*/

    static function rechercheSup(){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        } catch (mysqli_sql_exception $connexion){
            
        }
        try{
            $stmt = $mysqli->prepare("SELECT DISTINCT SUP FROM emp2");
            $stmt->execute();
            $rs = $stmt->get_result();
            $donnee = $rs->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $donnee;
        } catch (mysqli_sql_exception $rechercheSup){

        }
        
    }

    }
?>