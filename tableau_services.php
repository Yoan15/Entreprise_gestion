<!DOCTYPE html>

    <?php
        session_start();
        if (!isset ($_SESSION["username"])) {
            header("Location: formConnexion.php");
        }
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Tableau des services</title>
</head>
<body>
    <div class="container-fluid">
        <?php
            $db = mysqli_init();
            mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

            include 'crud_services.php';

            /*Ajout*/
            if (isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
                addService();
            }

            /*Modification*/

            if (isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)) {
                modifServices();
            }

            /*Suppression*/

            if (isset($_GET["action"]) && $_GET["action"] == "delete") {
                supprService();
            }

            /*Détails*/

            if (isset($_GET["action"]) && $_GET["action"] == "detail") {
                detailServices();
            }
        ?>
        <div class="row col-12">
            <h1>Tableau Services</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N°Service</th>
                        <th scope="col">Service</th>
                        <th scope="col">Ville</th>
                        <?php if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                        echo '<th scope="col">Détails</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>';
                        } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /*Lecture données*/
                        $rs = mysqli_query($db, 'SELECT * FROM serv2');

                        $donnee = rechercheServ();
                        /*print_r($donnee);*/

                        while ($data = mysqli_fetch_row($rs)) {
                        
                        echo '
                            <tr>';
                                echo'<td>' .$data[0]. '</td>';
                                echo'<td>' .$data[1]. '</td>';
                                echo'<td>' .$data[2]. '</td>';
                                if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                                echo'<td>
                                <a href="tableau_services.php?action=detail&NOSERV=' . $data[0] . '">
                                    <button type="button" class="btn btn-info">Détails</button>
                                </a>
                            </td>';
                            echo'<td>
                                <a href="ajout_services.php?action=modif&NOSERV=' . $data[0] . '">
                                    <button type="button" class="btn btn-warning">Modifier</button>
                                </a>
                            </td>';

                            $trouve = false;
                            for ($i=0; $i < count($donnee); $i++) { 
                                if ($donnee[$i]["NOSERV"] == $data[0]) {
                                    $trouve = true;
                                }
                            }
                            if (!$trouve) {
                                echo'<td>
                                        <a href="tableau_services.php?action=delete&NOSERV=' . $data[0] . '">
                                            <button type="button" class="btn btn-danger">Supprimer</button>
                                        </a>
                                    </td>'; }
                                '</tr>';    
                            }
                            
                        }
                    ?>
                </tbody>
            </table>
        </div>
            <?php
                if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                    echo '<a href="ajout_services.php?action=add">
                            <button type="button" class="btn btn-success">Ajouter un service</button>
                        </a>';
                } ?>
        <a href="tableau_employe.php">
            <button type="button" class="btn btn-success">Accéder au tableau des employés</button>
        </a>
        <a href="deconnexion.php">
                    <button type="button" class="btn btn-success">Se déconnecter</button>
                </a>
            <?php
                mysqli_free_result($rs);
                mysqli_close($db);
            ?>
    </div>
</body>
</html>