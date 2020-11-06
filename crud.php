<?php

    include_once 'class/Employe/Employes.php';

    /*Connexion*/
    function connection(){
        $db = mysqli_init();
        mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');
        return $db;
    }

//     /*Ajout procédural*/

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

    /*ajout orienté objet*/
    function addEmployes(Employes $employes){
        $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
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

    /*Supprimer procédural*/

    // function supprimeEmploye(){
    //     $db = connection();

    //     if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    //         $rs = mysqli_query($db, 'DELETE FROM emp2 WHERE NOEMP=' . $_GET["NOEMP"]);
    //     }
    // }

    /*supprimer orienté objet*/
    function supprimeEmploye(int $noemp){
        $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
        $stmt = $mysqli->prepare("DELETE FROM emp2 WHERE NOEMP=?");
        $stmt->bind_param("i", $noemp);
        $stmt->execute();
        $mysqli->close();
        
    }


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

    /*Modif Orienté objet*/
    function modifEmployes(Employes $employes){
        var_dump($employes);
        $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
        $stmt = $mysqli->prepare("UPDATE emp2 SET NOEMP=?, NOM=?, PRENOM=?, SUP=?, EMPLOI=?, EMBAUCHE=?, SAL=?, COMM=?, NOSERV=? WHERE NOEMP=?");
        $noemp = $employes->getNoemp();
        $nom = $employes->getNom();
        $prenom = $employes->getPrenom();
        $poste = $employes->getPoste();
        $sup = $employes->getSup();
        $embauche = $employes->getEmbauche();
        $sal= $employes->getSal();
        $comm = $employes->getComm();
        $serv = $employes->getNoserv();
        $stmt->bind_param("isssisddii", $noemp, $nom, $prenom, $poste, $sup, $embauche, $sal, $comm, $serv, $noemp);
        $stmt->execute();
        $mysqli->close();
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