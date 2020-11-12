<?php

        /*Connexion orienté objet*/

        function connection(){
            $mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
            return $mysqli;
        }

        /*Détail*/

        function detailEmploye(){
            $db = connection();
    
            if (isset($_GET["action"]) && $_GET["action"] == "detail"){
                $rs = mysqli_query($db, 'SELECT * FROM emp2 WHERE NOEMP=' . $_GET["NOEMP"]);
                $data = mysqli_fetch_row($rs);
                echo'Mon numéro d\'employé est le '.$data[0].' mon nom est '.$data[1].', mon prénom est '.$data[2].', je suis '.$data[3].', le numéro d\'employé de mon supérieur est le '.$data[4].' 
                je suis dans l\'entreprise depuis le '.$data[5].'';
                if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin") {
                echo', mon salaire est de '.$data[6].', je touche une commission de '.$data[7].'';
                }
                echo', je fais parti du service n° '.$data[8].'.</br>';
    
                echo'<a href="tableau_employeControlleur.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
            }
        }

    /*Recherche*/

    function rechercheSup(){
        $db = connection();
        $rs = mysqli_query($db, 'SELECT DISTINCT SUP FROM emp2');
        $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        return $data;
    }

?>