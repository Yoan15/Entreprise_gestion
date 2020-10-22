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
    <div class="container-fluid">
        <?php
            $db = mysqli_init();
            mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

            /*Ajout*/
            if (isset($_GET["action"]) && $_GET["action"] == "add"){
                if (isset($_POST["NOSERV"])&& !empty($_POST["NOSERV"])){
                    $noserv= $_POST["NOSERV"]?$POST["NOSERV"]: "NULL";
                    $service= $_POST["SERVICE"]?"'".$_POST["SERVICE"]."'":"NULL";
                    $ville= $_POST["VILLE"]?"'".$_POST["VILLE"]."'":"NULL";
        
                    $query= <<<QUERY
                    INSERT INTO serv2 (NOSERV, SERVICE, VILLE) 
                    VALUES ($noserv, $service, $ville)
QUERY;
                $rs = mysqli_query($db,$query);
                }
            }
        
        
            /*Suppression*/

            if (isset($_GET["action"]) && $_GET["action"] == "delete") {
                $rs = mysqli_query($db, 'DELETE FROM serv2 WHERE NOSERV=' . $_GET["NOSERV"]);
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
                        <th scope="col">Détails</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /*Lecture données*/
                        $rs = mysqli_query($db, 'SELECT * FROM serv2');

                        while ($data = mysqli_fetch_row($rs)) {
                        
                        echo '
                            <tr>
                                <td>' .$data[0]. '</td>
                                <td>' .$data[1]. '</td>
                                <td>' .$data[2]. '</td>
                                <td>
                                <a href="detail_service.php?action=detail&NOSERV=' . $data[0] . '">
                                    <button type="button" class="btn btn-info">Détails</button>
                                </a>
                            </td>
                            <td>
                                <a href="modif_services.php?action=modif&NOSERV=' . $data[0] . '">
                                    <button type="button" class="btn btn-warning">Modifier</button>
                                </a>
                            </td>
                            <td>
                                <a href="tableau_services.php?action=delete&NOSERV=' . $data[0] . '">
                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                </a>
                            </td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="modif_services.php">
                    <button type="button" class="btn btn-success">Ajouter un service</button>
                </a>
        <a href="tableau_employe.php">
            <button type="button" class="btn btn-success">Accéder au tableau des employés</button>
        </a>
            <?php
                mysqli_free_result($rs);
                mysqli_close($db);
            ?>
    </div>
</body>
</html>