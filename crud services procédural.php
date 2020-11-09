<?php

    /*Connexion procédural*/

     function connection(){
         $db = mysqli_init();
         mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');
         return $db;
     }

        /*Ajout*/

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

    /*Modification*/
    
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

    /*Suppression*/

    // function supprService(){
    //     $db = connection();
    //     if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    //         $rs = mysqli_query($db, 'DELETE FROM serv2 WHERE NOSERV=' . $_GET["NOSERV"]);
    //     }
    // }

    /*Détail*/

    function detailServices(){
        $db = connection();
        if (isset($_GET["action"]) && $_GET["action"] == "detail"){
            $rs = mysqli_query($db, 'SELECT * FROM serv2 WHERE NOSERV=' . $_GET["NOSERV"]);
            $data = mysqli_fetch_row($rs);
            echo'Ce service est le service n° '.$data[0].', le nom de ce service est '.$data[1].', il est situé à '.$data[2].'.</br>';
            echo'<a href="tableau_services.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
        }
    }

    function rechercheServ(){
        $db = connection();
        $rs = mysqli_query($db, 'SELECT NOSERV FROM serv2 WHERE NOSERV IN(SELECT DISTINCT NOSERV FROM emp2)');
        $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        return $data;
    }

?>