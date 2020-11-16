    <?php
        session_start();
        if (!isset ($_SESSION["username"])) {
            header("Location: formConnexion.php");
        }
        
        include_once '../class/Employe/Employes.php';
        include_once '../Service/EmployesServices.php';
        include_once '../Presentation/EmployesPresentation.php';
        head();
?>

    <?php
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

    $isAdmin = isset($_SESSION['username']) && ($_SESSION['profil']) == "admin";

    /*Détail orienté objet*/

    if (isset($_GET["action"]) && $_GET["action"] == "detail") {
        $noemp=$_GET["NOEMP"];
        $detail = EmployesServices::detailEmploye($noemp);
        echo'Mon numéro d\'employé est le '.$detail["NOEMP"].' mon nom est '.$detail["NOM"].', mon prénom est '.$detail["PRENOM"].', je suis '.$detail["EMPLOI"].', le numéro d\'employé de mon supérieur est le '.$detail["SUP"].' 
        je suis dans l\'entreprise depuis le '.$detail["EMBAUCHE"].'';
        if ($isAdmin) {
            echo', mon salaire est de '.$detail["SAL"].', je touche une commission de '.$detail["COMM"].'';
        }
        echo', je fais parti du service n° '.$detail["NOSERV"].'.</br>';
        echo'<a href="tableau_employeControlleur.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
    }

    $employes = EmployesServices::rechercheEmploye();
    $donnee = EmployesServices::rechercheSup();

    enteteTab($isAdmin);

    foreach ($employes as $data) {
        afficherEmployes($data, $isAdmin);
    }

    finTab();

    if ($isAdmin){
        boutonAdd($isAdmin);
    } 
    boutonsLiens($isAdmin);
    ?>