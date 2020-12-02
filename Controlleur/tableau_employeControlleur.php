    <?php
        session_start();
        if (!isset ($_SESSION["username"])) {
            header("Location: ../formConnexion.php");
        }
        
        include_once '../class/Employe/Employes.php';
        include_once '../Service/EmployesServices.php';
        include_once '../Presentation/EmployesPresentation.php';
        head();
?>

    <?php

    /*Compteur*/

    $dateAjout = EmployesServices::compteur();
    afficherCompteur($dateAjout);

    /*Filtres Tableau*/
    $filtre = EmployesServices::filtreEmploye();
    inputsFiltres();

    /*Ajout*/

    if(isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
        if (isset($_POST["NOEMP"]) && !Empty($_POST["NOEMP"])
            && isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){
                    
            $employes = new Employes( 
                htmlentities($_POST["NOEMP"]), 
                htmlentities($_POST["NOM"]?$_POST["NOM"]:NULL),
                htmlentities($_POST["PRENOM"]?$_POST["PRENOM"]:NULL),
                htmlentities($_POST["EMPLOI"]?$_POST["EMPLOI"]:NULL),
                htmlentities($_POST["SUP"]?$_POST["SUP"]:NULL),
                htmlentities($_POST["EMBAUCHE"]?$_POST["EMBAUCHE"]:NULL),
                htmlentities($_POST["SAL"]?$_POST["SAL"]:NULL),
                htmlentities($_POST["COMM"]?$_POST["COMM"]:NULL),
                htmlentities($_POST["NOSERV"])
            );
            try{
                EmployesServices::addEmployes($employes);
            }catch (ServiceException $e){
                afficherErreurAjout($e->getCode());
            }
            
        }
    }

    /*Modif*/

    if(isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)){
        if (isset($_POST["NOEMP"]) && !Empty($_POST["NOEMP"])
            && isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){

            $employes = new Employes(
                htmlentities($_POST["NOEMP"]), 
                htmlentities($_POST["NOM"]?$_POST["NOM"]:NULL),
                htmlentities($_POST["PRENOM"]?$_POST["PRENOM"]:NULL),
                htmlentities($_POST["EMPLOI"]?$_POST["EMPLOI"]:NULL),
                htmlentities($_POST["SUP"]?$_POST["SUP"]:NULL),
                htmlentities($_POST["EMBAUCHE"]?$_POST["EMBAUCHE"]:NULL),
                htmlentities($_POST["SAL"]?$_POST["SAL"]:NULL),
                htmlentities($_POST["COMM"]?$_POST["COMM"]:NULL),
                htmlentities($_POST["NOSERV"])
            );
            try{
                EmployesServices::modifEmployes($employes);
            }catch (ServiceException $e){
                afficherErreurUpdate($e->getCode());
            }
        }
    }

    /*suppression*/
    
    if (isset($_GET["action"]) && $_GET["action"]=="delete") {
        $noemp=htmlentities($_GET["NOEMP"]);
        try{
            EmployesServices::supprimeEmploye($noemp);
        }catch (ServiceException $e){
            afficherErreurSuppr($e->getCode());
        }
    }

    $isAdmin = isset($_SESSION['username']) && ($_SESSION['profil']) == "admin";

    /*Détail orienté objet*/

    if (isset($_GET["action"]) && $_GET["action"] == "detail") {
        $noemp=htmlentities($_GET["NOEMP"]);
        $detail = EmployesServices::detailEmploye($noemp);
        afficherDetail($detail, $isAdmin);
    }

    try{
        $employes = EmployesServices::rechercheEmploye();
        $donnee = EmployesServices::rechercheSup();
        enteteTab($isAdmin);
        foreach ($employes as $data) {
            afficherEmployes($data, $isAdmin, $donnee);
        }
    } catch(ServiceException $e){
        afficherErreurSelect($e->getCode());
    }
    
    

    

    finTab();

    if ($isAdmin){
        boutonAdd($isAdmin);
    } 
        boutonsLiens($isAdmin);

    finPage();
    ?>