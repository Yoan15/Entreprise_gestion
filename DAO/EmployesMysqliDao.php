<?php

    require_once ("../class/Employe/DAOException.php");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class EmployesMysqliDao{

    /*compteur*/

    static function compteur(){
        $mysqli = new mysqli('localhost', 'yoan', 'kongo','employer');
        $date_ajout=date('Y-m-d');
        $stmt=$mysqli->prepare("select * from emp2 where COMPTEUR='".$date_ajout."'");
        $stmt->execute();
        $rs=$stmt->get_result();
        $date_ajout = $rs->fetch_all(MYSQLI_ASSOC);
        return $date_ajout;
        $mysqli->close();
    }

    /*ajout*/

    static function addEmployes($employes){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare("INSERT INTO emp2 (NOEMP, NOM, PRENOM, EMPLOI, SUP, EMBAUCHE, SAL, COMM, NOSERV, COMPTEUR) 
            VALUES (?,?,?,?,?,?,?,?,?,?)");
            $noemp = $employes->getNoemp();
            $nom = $employes->getNom();
            $prenom = $employes->getPrenom();
            $poste = $employes->getPoste();
            $sup = $employes->getSup();
            $embauche = $employes->getEmbauche();
            $sal= $employes->getSal();
            $comm = $employes->getComm();
            $serv = $employes->getNoserv();
            $date_ajout= date('Y-m-d');
            $stmt->bind_param("isssisddis", $noemp, $nom, $prenom, $poste, $sup, $embauche, $sal, $comm, $serv, $date_ajout);
            $stmt->execute();
        } catch (mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        } finally {
            $mysqli->close();
        }
    }

    /*supprimer*/

    static function supprimeEmploye(int $noemp){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare("DELETE FROM emp2 WHERE NOEMP=?");
            $stmt->bind_param("i", $noemp);
            $stmt->execute();
        } catch (mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        } finally{
            $mysqli->close();
        }
    }

    /*Modif*/
    
    static function modifEmployes($employes){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
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
        } catch (mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        } finally{
            $mysqli->close();
        }
    }

    /*Recherche Employes*/
    static function rechercheEmploye(){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt =$mysqli->prepare("SELECT * FROM emp2");
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            return $data;
        } catch (mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        }
        finally{
            $mysqli->close();
        }
    }

    /*Détail*/

    static function detailEmploye(int $noemp){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare('SELECT * FROM emp2 WHERE NOEMP=?');
            $stmt->bind_param("i", $noemp);
            $stmt->execute();
            $rs = $stmt->get_result();
            $detail = $rs->fetch_array(MYSQLI_ASSOC);
            return $detail; 
        } catch (mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        } finally {
            $mysqli->close();
        }
    }

    /*Recherche*/

    static function rechercheSup(){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare("SELECT DISTINCT SUP FROM emp2");
            $stmt->execute();
            $rs = $stmt->get_result();
            $donnee = $rs->fetch_all(MYSQLI_ASSOC);
            return $donnee;
        } catch (mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        } finally {
            $mysqli->close();
        }
        
    }

    }
?>