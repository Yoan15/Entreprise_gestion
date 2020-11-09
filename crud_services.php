<?php

include_once 'class/Employe/Service.php';

    /*Connexion procédural*/

    // function connection(){
    //     $db = mysqli_init();
    //     mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');
    //     return $db;
    // }

    /*Connexion orienté objet*/

    function connection(){
        $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
        return $mysqli;
    }
        /*Ajout procédural*/

    // function addService(){
    //     $db = connection();
//         if (isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
//             if (isset($_POST["NOSERV"])&& !empty($_POST["NOSERV"])){
//                 $noserv= $_POST["NOSERV"]?$_POST["NOSERV"]: "NULL";
//                 $serv= $_POST["SERV"]?"'".$_POST["SERV"]."'":"NULL";
//                 $ville= $_POST["VILLE"]?"'".$_POST["VILLE"]."'":"NULL";
    
//                 $query= <<<QUERY
//                 INSERT INTO serv2 (NOSERV, SERV, VILLE) 
//                 VALUES ($noserv, $serv, $ville)
// QUERY;
//             $rs = mysqli_query($db,$query);
//             var_dump($rs);
//             }
//         }
//     }

    /*ajout orienté objet*/

    function addService(Service $service){
        $mysqli = connection();
        $stmt = $mysqli->prepare("INSERT INTO serv2 (NOSERV, SERV, VILLE) VALUES (?,?,?)");
        $noserv= $service->getNoserv();
        $serv= $service->getServ();
        $ville= $service->getVille();
        $stmt->bind_param("iss", $noserv, $serv, $ville);
        $stmt->execute();
        $mysqli->close();
    }


    /*Modification procédural*/
    
    // function modifServices(){
    //     $db = connection();
    //     if (isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)) {
    //         if (isset($_POST["NOSERV"])&& !empty($_POST["NOSERV"])){

    //             $noserv= $_POST["NOSERV"]?$_POST["NOSERV"]: "NULL";
    //             $service= $_POST["SERV"]?"'".$_POST["SERV"]."'":"NULL";
    //             $ville= $_POST["VILLE"]?"'".$_POST["VILLE"]."'":"NULL";

    //         $rs= mysqli_query($db, "UPDATE serv2 SET SERV= $service, VILLE= $ville WHERE NOSERV= {$_POST["NOSERV"]}");
    //         }
    //     }
    // }

        /*modif orienté objet*/

        function modifService(Service $service){
            $mysqli = connection();
            $stmt = $mysqli->prepare("UPDATE serv2 SET NOSERV=?, SERV=?, VILLE=? WHERE NOSERV=?");
            $noserv= $service->getNoserv();
            $serv= $service->getServ();
            $ville= $service->getVille();
            $stmt->bind_param("issi", $noserv, $serv, $ville, $noserv);
            $stmt->execute();
            $mysqli->close();
        }


    /*Suppression procédural*/

    // function supprService(){
    //     $db = connection();
    //     if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    //         $rs = mysqli_query($db, 'DELETE FROM serv2 WHERE NOSERV=' . $_GET["NOSERV"]);
    //     }
    // }

    /*supprimer orienté objet*/

    function supprService(int $noserv){
        $mysqli = connection();
        $stmt = $mysqli->prepare("DELETE FROM serv2 WHERE NOSERV=?");
        $stmt->bind_param("i", $noserv);
        $stmt->execute();
        $mysqli->close();
        
    }

    /*Détail procédural*/

    function detailServices(){
        $db = connection();
        if (isset($_GET["action"]) && $_GET["action"] == "detail"){
            $rs = mysqli_query($db, 'SELECT * FROM serv2 WHERE NOSERV=' . $_GET["NOSERV"]);
            $data = mysqli_fetch_row($rs);
            echo'Ce service est le service n° '.$data[0].', le nom de ce service est '.$data[1].', il est situé à '.$data[2].'.</br>';
            echo'<a href="tableau_services.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
        }
    }

    /*Détail orienté objet*/

    // function detailService(int $noserv){
    //     $mysqli = connection();
    //     $stmt = $mysqli->prepare('SELECT * FROM serv2 WHERE NOSERV=?');
    //     $stmt->bind_param("i", $noserv);
    //     $stmt->execute();
    //     $rs = $stmt->get_result();
    //     $data = $rs->fetch_array(MYSQLI_ASSOC);
    //     $mysqli->close();
    //     return $data;
    //     var_dump($data);
    //     }

    function rechercheServ(){
        $db = connection();
        $rs = mysqli_query($db, 'SELECT NOSERV FROM serv2 WHERE NOSERV IN(SELECT DISTINCT NOSERV FROM emp2)');
        $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        return $data;
    }
?>