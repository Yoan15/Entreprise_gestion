<?php
        session_start();
        if (!isset ($_SESSION["username"])) {
            header("Location: formConnexion.php");
        }
        include_once '../crud services procédural.php';
        include_once '../class/Employe/Service.php';
        include_once '../Service/ServiceService.php';
        include_once '../Presentation/ServicePresentation.php';
        afficherPage();
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
                    afficherPage();
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

            /*Détails procédural*/

            if (isset($_GET["action"]) && $_GET["action"] == "detail") {
                detailServices();
            }

            /*Détails orienté objet*/

            // if (isset($_GET["action"]) && $_GET["action"] == "detail"){                
            //     echo'Ce service est le service n° '.$data[0].', le nom de ce service est '.$data[1].', il est situé à '.$data[2].'.</br>';
            //     echo'<a href="tableau_services.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
            // }

            enteteTab();

            if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                enteteModifSuppr();
            }
        ?>

                <tbody>
                    <?php
                    /*Lecture données*/
                        $rs = mysqli_query($db, 'SELECT * FROM serv2');

                        $donnee = rechercheServ();
                        /*print_r($donnee);*/

                        while ($data = mysqli_fetch_row($rs)) {
                        
                        corpsTab($data);

                            if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                                boutonModif($data);

                            $trouve = false;
                            for ($i=0; $i < count($donnee); $i++) { 
                                if ($donnee[$i]["NOSERV"] == $data[0]) {
                                    $trouve = true;
                                }
                            }
                            if (!$trouve) {
                                boutonSuppr($data);    
                            }   
                            } 
                        }
                        finTab();
                    ?>
            <?php
                boutonsLiens();
                mysqli_free_result($rs);
                mysqli_close($db);
                finPage();
            ?>