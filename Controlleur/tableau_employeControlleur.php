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
            try{
                EmployesServices::modifEmployes($employes);
            }catch (ServiceException $e){
                afficherErreurUpdate($e->getCode());
            }
        }
    }

    /*suppression*/
    
    if (isset($_GET["action"]) && $_GET["action"]=="delete") {
        $noemp=$_GET["NOEMP"];
        try{
            EmployesServices::supprimeEmploye($noemp);
        }catch (ServiceException $e){
            afficherErreurSuppr($e->getCode());
        }
    }

    $isAdmin = isset($_SESSION['username']) && ($_SESSION['profil']) == "admin";

    /*Détail orienté objet*/

    if (isset($_GET["action"]) && $_GET["action"] == "detail") {
        $noemp=$_GET["NOEMP"];
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
    ?>