<?php
    function addEmploye(){
        $db = mysqli_init();
        mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

        if (isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
            if (isset($_POST["NOEMP"])&& !empty($_POST["NOEMP"])
            && isset($_POST["NOSERV"])&& !empty($_POST["NOSERV"])){
                $noemp= $_POST["NOEMP"]?$_POST["NOEMP"]: "NULL";
                $nom= $_POST["NOM"]?"'".$_POST["NOM"]."'":"NULL";
                $prenom= $_POST["PRENOM"]?"'".$_POST["PRENOM"]."'":"NULL";
                $poste= $_POST["EMPLOI"]?"'".$_POST["EMPLOI"]."'":"NULL";
                $sup= $_POST["SUP"]?$_POST["SUP"]:"NULL";
                $embauche= $_POST["EMBAUCHE"]?"'".$_POST["EMBAUCHE"]."'":"NULL";
                $sal= $_POST["SAL"]?$_POST["SAL"]:"NULL";
                $comm= $_POST["COMM"]?$_POST["COMM"]:"NULL";
                $serv= $_POST["NOSERV"]?$_POST["NOSERV"]:"NULL";
    
                $query= <<<QUERY
                INSERT INTO emp2 (NOEMP, NOM, PRENOM, EMPLOI, SUP, EMBAUCHE, SAL, COMM, NOSERV) 
                VALUES ($noemp, $nom, $prenom, $poste, $sup, $embauche, $sal, $comm, $serv)
QUERY;
            $rs = mysqli_query($db,$query);
            }
        }
    }

    function supprimeEmploye(){
        $db = mysqli_init();
        mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

        if (isset($_GET["action"]) && $_GET["action"] == "delete") {
            $rs = mysqli_query($db, 'DELETE FROM emp2 WHERE NOEMP=' . $_GET["NOEMP"]);
        }
    }

?>