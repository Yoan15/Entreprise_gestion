<?php
    function connection(){
        $db = mysqli_init();
        mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');
        return $db;
    }

    function addService(){
        $db = connection();

        /*Ajout*/
        if (isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
            if (isset($_POST["NOSERV"])&& !empty($_POST["NOSERV"])){
                $noserv= $_POST["NOSERV"]?$_POST["NOSERV"]: "NULL";
                $service= $_POST["SERV"]?"'".$_POST["SERV"]."'":"NULL";
                $ville= $_POST["VILLE"]?"'".$_POST["VILLE"]."'":"NULL";
    
                $query= <<<QUERY
                INSERT INTO serv2 (NOSERV, SERV, VILLE) 
                VALUES ($noserv, $service, $ville)
QUERY;
            $rs = mysqli_query($db,$query);
            }
        }
    }

    function modifServices(){
        $db = connection();
        /*Modification*/

        if (isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)) {
            if (isset($_POST["NOSERV"])&& !empty($_POST["NOSERV"])){

                $noserv= $_POST["NOSERV"]?$_POST["NOSERV"]: "NULL";
                $service= $_POST["SERV"]?"'".$_POST["SERV"]."'":"NULL";
                $ville= $_POST["VILLE"]?"'".$_POST["VILLE"]."'":"NULL";

            $rs= mysqli_query($db, "UPDATE serv2 SET SERV= $service, VILLE= $ville WHERE NOSERV= {$_POST["NOSERV"]}");
            }
        }
    }

    function supprService(){
        $db = connection();

        /*Suppression*/

        if (isset($_GET["action"]) && $_GET["action"] == "delete") {
            $rs = mysqli_query($db, 'DELETE FROM serv2 WHERE NOSERV=' . $_GET["NOSERV"]);
        }
    }
?>