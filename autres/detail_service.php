<?php
        session_start();
        if (!isset ($_SESSION["username"])) {
            header("Location: formConnexion.php");
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Détails</title>
</head>
<body>
<?php
    $db = mysqli_init();
    mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

    if (mysqli_connect_errno()) {
        print_r("Echec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }
?>
<div class="row col-12">
            <h1>Détails</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N°Service</th>
                        <th scope="col">Service</th>
                        <th scope="col">Ville</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rs = mysqli_query($db, 'SELECT * FROM serv2 WHERE NOSERV=' . $_GET["NOSERV"]);

                    $data = mysqli_fetch_row($rs);

                    echo '
                    <tr>
                        <td>' .$data[0]. '</td>
                        <td>' .$data[1]. '</td>
                        <td>' .$data[2]. '</td>
                    </tr>';
                ?>
                </tbody>
            </table>
            <a href="tableau_services.php"><button type="button" class="btn btn-success">Accéder au tableau des services</button></a>
            </div>
<?php
    mysqli_free_result($rs);
    mysqli_close($db);
?>
    </div>            
</body>
</html>