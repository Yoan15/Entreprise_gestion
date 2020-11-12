<?php

    /*Connexion procédural*/

     function connection(){
         $db = mysqli_init();
         mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');
         return $db;
     }

    /*Détail*/

    function detailServices(){
        $db = connection();
        if (isset($_GET["action"]) && $_GET["action"] == "detail"){
            $rs = mysqli_query($db, 'SELECT * FROM serv2 WHERE NOSERV=' . $_GET["NOSERV"]);
            $data = mysqli_fetch_row($rs);
            echo'Ce service est le service n° '.$data[0].', le nom de ce service est '.$data[1].', il est situé à '.$data[2].'.</br>';
            echo'<a href="tableau_servicesControlleur.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
        }
    }

    function rechercheServ(){
        $db = connection();
        $rs = mysqli_query($db, 'SELECT NOSERV FROM serv2 WHERE NOSERV IN(SELECT DISTINCT NOSERV FROM emp2)');
        $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        return $data;
    }

?>