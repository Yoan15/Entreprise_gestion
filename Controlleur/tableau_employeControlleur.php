    <?php
        session_start();
        if (!isset ($_SESSION["username"])) {
            header("Location: formConnexion.php");
        }
        
        include_once '../crud procédural.php';
        include_once '../class/Employe/Employes.php';
        include_once '../Service/EmployesServices.php';
        include_once '../Presentation/EmployesPresentation.php';
        head();
?>

    <?php
        $db = mysqli_init();
        mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

    /*Ajout*/

    if(isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
        if (isset($_POST["NOEMP"]) && !Empty($_POST["NOEMP"])
            && isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){
                    
            $employes = new Employes( 
                $_POST["NOEMP"], 
                $_POST["NOM"]?$_POST["NOM"]:NULL,
                $_POST["PRENOM"]?$_POST["PRENOM"]:NULL,
                $_POST["EMPLOI"]?$_POST["EMPLOI"]:NULL,
                $_POST["SUP"]?$_POST["SUP"]:NULL,
                $_POST["EMBAUCHE"]?$_POST["EMBAUCHE"]:NULL,
                $_POST["SAL"]?$_POST["SAL"]:NULL,
                $_POST["COMM"]?$_POST["COMM"]:NULL,
                $_POST["NOSERV"]
            );
            EmployesServices::addEmployes($employes);
        }
    }

    /*Modif*/

    if(isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)){
        if (isset($_POST["NOEMP"]) && !Empty($_POST["NOEMP"])
            && isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){

            $employes = new Employes(
                $_POST["NOEMP"], 
                $_POST["NOM"]?$_POST["NOM"]:NULL,
                $_POST["PRENOM"]?$_POST["PRENOM"]:NULL,
                $_POST["EMPLOI"]?$_POST["EMPLOI"]:NULL,
                $_POST["SUP"]?$_POST["SUP"]:NULL,
                $_POST["EMBAUCHE"]?$_POST["EMBAUCHE"]:NULL,
                $_POST["SAL"]?$_POST["SAL"]:NULL,
                $_POST["COMM"]?$_POST["COMM"]:NULL,
                $_POST["NOSERV"]
            );
            EmployesServices::modifEmployes($employes);
        }
    }

    /*suppression*/
    
    if (isset($_GET["action"]) && $_GET["action"]=="delete") {
        $noemp=$_GET["NOEMP"];
        EmployesServices::supprimeEmploye($noemp);
    }


    /*Détails procédural*/
    
    if (isset($_GET["action"]) && $_GET["action"] == "detail") {
        detailEmploye();
    }

    /*Détail orienté objet*/

    // if (isset($_GET["action"]) && $_GET["action"] == "detail") {
    //     $noemp=$_GET["NOEMP"];
    //     EmployesMysqliDao::detailEmploye($noemp);
    //     echo'Mon numéro d\'employé est le '.$data[0].' mon nom est '.$data[1].', mon prénom est '.$data[2].', je suis '.$data[3].', le numéro d\'employé de mon supérieur est le '.$data[4].' 
    //     je suis dans l\'entreprise depuis le '.$data[5].'';
    //     if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin") {
    //         echo', mon salaire est de '.$data[6].', je touche une commission de '.$data[7].'';
    //     }
    //     echo', je fais parti du service n° '.$data[8].'.</br>';
    //     echo'<a href="tableau_employeControlleur.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
    // }

    ?>
        <?php

                if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){

                }

        ?>
        
        <?php
        if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){

        }

        ?>

    <?php
    /*Données Tab*/

    $rs = mysqli_query($db, 'SELECT * FROM emp2');

    $donnee = rechercheSup();
    /*print_r($donnee);*/
    while ($data = mysqli_fetch_row($rs)) {
                    

       afficherEmployes($data);

        if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin") {

        }
                        



        
        if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin") {

                        
        $trouve = false;
        for ($i=0; $i < count($donnee); $i++) { 
            if ($donnee[$i]["SUP"] == $data[0]) {
                $trouve=true;
            }
        }
        if (!$trouve) {

        }
        }
    }

    ?>
    
    <?php
        if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
            boutonAdd();
        } 
        boutonsLiens();
    ?>

    <?php
        mysqli_free_result($rs);
        mysqli_close($db);

    ?>