<?php

    require_once ("../class/Employe/DAOException.php");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class ServiceMysqliDao{

    /*ajout*/

    static function addService(Service $service){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare("INSERT INTO serv2 (NOSERV, SERV, VILLE) VALUES (?,?,?)");
            $noserv = new ServiceMysqliDao;
            $noserv= $service->getNoserv();
            $serv= $service->getServ();
            $ville= $service->getVille();
            $stmt->bind_param("iss", $noserv, $serv, $ville);
            $stmt->execute();
        }catch(mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        }finally{
            $mysqli->close();
        }
    }



    /*modif*/

    static function modifService(Service $service){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare("UPDATE serv2 SET NOSERV=?, SERV=?, VILLE=? WHERE NOSERV=?");
            $noserv= $service->getNoserv();
            $serv= $service->getServ();
            $ville= $service->getVille();
            $stmt->bind_param("issi", $noserv, $serv, $ville, $noserv);
            $stmt->execute();
        }catch(mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        } finally{
            $mysqli->close();
        }
    }

    /*supprimer*/

    static function supprService(int $noserv){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare("DELETE FROM serv2 WHERE NOSERV=?");
            $stmt->bind_param("i", $noserv);
            $stmt->execute();
        } catch (mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        } finally{
            $mysqli->close();
        }
    }

    static function detailService(int $noserv){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare('SELECT * FROM serv2 WHERE NOSERV=?');
            $stmt->bind_param("i", $noserv);
            $stmt->execute();
            $rs = $stmt->get_result();
            $detail = $rs->fetch_array(MYSQLI_ASSOC);
            return $detail;
        } catch(mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        } finally{
            $mysqli->close();
        }
    }

    /*Recherche services*/
    static function rechercheService(){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt=$mysqli->prepare('SELECT * FROM serv2');
            $stmt->execute();
            $rs=$stmt->get_result();
            $data=$rs->fetch_all(MYSQLI_ASSOC);
            return $data;
        } catch(mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        }finally{
            $mysqli->close();
            
        }
    }

    /*Recherche*/

    static function rechercheServEmp(){
        try{
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            $stmt = $mysqli->prepare('SELECT NOSERV FROM serv2 WHERE NOSERV IN(SELECT DISTINCT NOSERV FROM emp2)');
            $stmt->execute();
            $rs = $stmt->get_result();
            $donnee = $rs->fetch_all(MYSQLI_ASSOC);
            return $donnee;
        } catch(mysqli_sql_exception $e){
            throw new DAOException($e->getMessage(), $e->getCode());
        }finally{
            $mysqli->close();
        }
    }
}
?>