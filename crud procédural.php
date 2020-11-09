<?php

    /*Connexion procédural*/
    // function connection(){
    //     $db = mysqli_init();
    //     mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');
    //     return $db;
    // }

     /*Ajout*/

//     function addEmploye(){
//         $db = connection();

        // if (isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
        //     if (isset($_POST["NOEMP"])&& !empty($_POST["NOEMP"])
        //     && isset($_POST["NOSERV"])&& !empty($_POST["NOSERV"])){
        //         $noemp= $_POST["NOEMP"]?$_POST["NOEMP"]: "NULL";
        //         $nom= $_POST["NOM"]?"'".$_POST["NOM"]."'":"NULL";
        //         $prenom= $_POST["PRENOM"]?"'".$_POST["PRENOM"]."'":"NULL";
        //         $poste= $_POST["EMPLOI"]?"'".$_POST["EMPLOI"]."'":"NULL";
        //         $sup= $_POST["SUP"]?$_POST["SUP"]:"NULL";
        //         $embauche= $_POST["EMBAUCHE"]?"'".$_POST["EMBAUCHE"]."'":"NULL";
        //         $sal= $_POST["SAL"]?$_POST["SAL"]:"NULL";
        //         $comm= $_POST["COMM"]?$_POST["COMM"]:"NULL";
        //         $serv= $_POST["NOSERV"]?$_POST["NOSERV"]:"NULL";    
//                 $query= <<<QUERY
//                 INSERT INTO emp2 (NOEMP, NOM, PRENOM, EMPLOI, SUP, EMBAUCHE, SAL, COMM, NOSERV) 
//                 VALUES ($noemp, $nom, $prenom, $poste, $sup, $embauche, $sal, $comm, $serv)
// QUERY;
//             $rs = mysqli_query($db,$query);
//             }
//         }
//     }

    /*Supprimer*/

    // function supprimeEmploye(){
    //     $db = connection();
    //     if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    //         $rs = mysqli_query($db, 'DELETE FROM emp2 WHERE NOEMP=' . $_GET["NOEMP"]);
    //     }
    // }

        /*Modification*/

    // function modifEmploye(){
    //     $db = connection();
    //     if (isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)){
    //         if (isset($_POST["NOEMP"])&& !empty($_POST["NOEMP"])){   
    //             $noemp= $_POST["NOEMP"]?$_POST["NOEMP"]: "NULL";
    //             $nom= $_POST["NOM"]?"'".$_POST["NOM"]."'":"NULL";
    //             $prenom= $_POST["PRENOM"]?"'".$_POST["PRENOM"]."'":"NULL";
    //             $poste= $_POST["EMPLOI"]?"'".$_POST["EMPLOI"]."'":"NULL";
    //             $sup= $_POST["SUP"]?$_POST["SUP"]:"NULL";
    //             $embauche= $_POST["EMBAUCHE"]?"'".$_POST["EMBAUCHE"]."'":"NULL";
    //             $sal= $_POST["SAL"]?$_POST["SAL"]:"NULL";
    //             $comm= $_POST["COMM"]?$_POST["COMM"]:"NULL";
    //             $serv= $_POST["NOSERV"]?$_POST["NOSERV"]: "NULL";  
    //         $rs = mysqli_query($db,"UPDATE emp2 SET NOM=$nom, PRENOM=$prenom, SUP=$sup, EMPLOI=$poste, EMBAUCHE=$embauche, SAL=$sal, COMM=$comm, NOSERV=$serv WHERE NOEMP={$_POST["NOEMP"]}");
    //         }
    //     }
    // }

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
    
                echo'<a href="tableau_employe.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
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