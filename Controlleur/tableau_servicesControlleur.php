<?php
        session_start();
        if (!isset ($_SESSION["username"])) {
            header("Location: ../formConnexion.php");
        }
        include_once '../class/Employe/Service.php';
        include_once '../Service/ServiceService.php';
        include_once '../Presentation/ServicePresentation.php';
        head();
    ?>
    <?php

        /*Ajout*/

        if(isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
            if (isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){                   
                $service = new Service( 
                    $_POST["NOSERV"],
                    $_POST["SERV"]?$_POST["SERV"]:NULL,
                    $_POST["VILLE"]?$_POST["VILLE"]:NULL
                );
                try{
                    ServiceService::addService($service);
                }catch(ServiceException $e){
                    afficherErreurAjout($e->getCode());
                }
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
                try{
                    ServiceService::modifService($service);
                }catch (ServiceException $e){
                    afficherErreurUpdate($e->getCode());
                }
            }
        }

        /*suppression*/

        if (isset($_GET["action"]) && $_GET["action"]=="delete") {
            $noserv=$_GET["NOSERV"];
            try{
                ServiceService::supprService($noserv);
            }catch(ServiceException $e){
                afficherErreurSuppr($e->getCode());
            }
        }

        /*Détails orienté objet*/

        if (isset($_GET["action"]) && $_GET["action"] == "detail"){   
            $noserv = $_GET["NOSERV"];
            $detail = ServiceService::detailService($noserv);             
            detailService($detail);
        }
        
        $isAdmin = isset($_SESSION['username']) && ($_SESSION['profil']) == "admin";

        try{
            $services = ServiceService::rechercheService();
            $donnee = ServiceService::rechercheServEmp();
            enteteTab($isAdmin);
            foreach ($services as $data) {
                afficherServices($data, $isAdmin, $donnee);
            }
        } catch(ServiceException $e){
            afficherErreurSelect($e->getCode());
        }
        finTab();

        if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
            boutonAdd();
        }
        boutonsLiens();
    ?>