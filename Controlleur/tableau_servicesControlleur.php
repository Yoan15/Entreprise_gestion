<?php
        session_start();
        if (!isset ($_SESSION["username"])) {
            header("Location: formConnexion.php");
        }
        include_once '../class/Employe/Service.php';
        include_once '../Service/ServiceService.php';
        include_once '../Presentation/ServicePresentation.php';
        head();
    ?>
        <?php
            $db = mysqli_init();
            mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

            /*Ajout*/

            if(isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
                if (isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){                   
                    $service = new Service( 
                        $_POST["NOSERV"],
                        $_POST["SERV"]?$_POST["SERV"]:NULL,
                        $_POST["VILLE"]?$_POST["VILLE"]:NULL
                    );
                    ServiceService::addService($service);
                }
            }

            /*Modif*/

            if(isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)){
                if (isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){                   
                    $service = new Service( 
                        $_POST["NOSERV"],
                        $_POST["SERV"]?$_POST["SERV"]:NULL,
                        $_POST["VILLE"]?$_POST["VILLE"]:NULL
                    );
                    ServiceService::modifService($service);
                }
            }

            /*suppression*/

            if (isset($_GET["action"]) && $_GET["action"]=="delete") {
                $noserv=$_GET["NOSERV"];
                ServiceService::supprService($noserv);
            }

            /*Détails orienté objet*/

            if (isset($_GET["action"]) && $_GET["action"] == "detail"){   
                $noserv = $_GET["NOSERV"];
                $detail = ServiceService::detailService($noserv);             
                echo'Ce service est le service n° '.$detail["NOSERV"].', le nom de ce service est '.$detail["SERV"].', il est situé à '.$detail["VILLE"].'.</br>';
                echo'<a href="tableau_servicesControlleur.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
            }

            $services = ServiceService::rechercheService();
            $isAdmin = isset($_SESSION['username']) && ($_SESSION['profil']) == "admin";

            enteteTab($isAdmin);

            foreach ($services as $data) {
                afficherServices($data, $isAdmin);
            }
            finTab();

            if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                boutonAdd();
            }
            boutonsLiens();
            ?>