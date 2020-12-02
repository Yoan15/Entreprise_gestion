<?php
    function head() {
        echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Tableau des services</title>
    </head>
    <body>
        <div class="container-fluid">';
    }

    function afficherErreurAjout($errorCode=null){
        if ($errorCode && $errorCode == 1062){
            echo "<div class='alert alert-danger'>Service déjà existant!</div>";
        }
    }

    function afficherErreurUpdate($errorCode=null){
        if ($errorCode && $errorCode == 1054 || $errorCode == 1064){
            echo "<div class='alert alert-danger'>Erreur lors de la mise à jour du service ! Veuillez réessayer ultérieurement.</div>";
        }
    }
    
    function afficherErreurSuppr($errorCode=null){
        if ($errorCode && $errorCode == 1451){
            echo "<div class='alert alert-danger'>Impossible de supprimer ce service car il est relié à un ou plusieurs employé(s) !</div>";
        }
    }
    
    function afficherErreurSelect($errorCode=null){
        if ($errorCode && $errorCode == 1064){
            echo "<div class='alert alert-danger'>Impossible de récupérer les informations !</div>";
        }
    }

    function enteteTab($isAdmin){
        echo '
        <div class="row col-12">
        <h1>Tableau Services</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">N°Service</th>
                    <th scope="col">Service</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Détails</th>';
                    if ($isAdmin){
                        echo '
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                </tr>
                </thead>';
                    }
    }

    function corpsTab($data, $isAdmin, $donnee){
        echo '
            <tr>';
            echo'<td>' .$data["NOSERV"]. '</td>';
            echo'<td>' .$data["SERV"]. '</td>';
            echo'<td>' .$data["VILLE"]. '</td>';
            echo'<td>
                <a href="tableau_servicesControlleur.php?action=detail&NOSERV=' . $data["NOSERV"] . '">
                    <button type="button" class="btn btn-info">Détails</button>
                </a>
            </td>';
            if ($isAdmin){
                echo'<td>
            <a href="../ajout_services.php?action=modif&NOSERV=' . $data["NOSERV"] . '">
                <button type="button" class="btn btn-warning">Modifier</button>
            </a>
            </td>';
            }
            $trouve = false;
        for ($i=0; $i < count($donnee); $i++) { 
            if ($donnee[$i]["NOSERV"] == $data["NOSERV"]) {
                $trouve = true;
            }
        }
        if (!$trouve) {
            echo'<td>
                <a href="tableau_servicesControlleur.php?action=delete&NOSERV=' . $data["NOSERV"] . '">
                    <button type="button" class="btn btn-danger">Supprimer</button>
                </a>
                </td>
            </tr>';
        }
        }

    function finTab(){
        echo '</tbody>
        </table>
    </div>';
    }

    function detailService($detail){
        echo'Ce service est le service n° '.$detail["NOSERV"].', le nom de ce service est '.$detail["SERV"].', il est situé à '.$detail["VILLE"].'.</br>';
        echo'<a href="tableau_servicesControlleur.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
    }

    function boutonAdd(){
        echo '<a href="../ajout_services.php?action=add">
                <button type="button" class="btn btn-success">Ajouter un service</button>
            </a>';
    }

    function boutonsLiens(){
        echo'<a href="tableau_employeControlleur.php">
                <button type="button" class="btn btn-success">Accéder au tableau des employés</button>
            </a>';
        echo'<a href="../deconnexion.php">
                <button type="button" class="btn btn-success">Se déconnecter</button>
            </a>';
    }

    function finPage(){
        echo '</div>
        </body>
        </html>';
    }

    function afficherServices($data, $isAdmin, $donnee){
        corpsTab($data, $isAdmin, $donnee);
        
    }
?>