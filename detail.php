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
                        <th scope="col">N°Employé</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Poste</th>
                        <th scope="col">Supérieur</th>
                        <th scope="col">Date d'embauche</th>
                        <th scope="col">Salaire</th>
                        <th scope="col">Commission</th>
                        <th scope="col">N°Service</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $rs = mysqli_query($db, 'SELECT * FROM emp2 WHERE NOEMP=' . $_GET["NOEMP"]);

                    $data = mysqli_fetch_row($rs);

                    echo '
                    <tr>
                        <td>' .$data[0]. '</td>
                        <td>' .$data[1]. '</td>
                        <td>' .$data[2]. '</td>
                        <td>' .$data[3]. '</td>
                        <td>' .$data[4]. '</td>
                        <td>' .$data[5]. '</td>
                        <td>' .$data[6]. '</td>
                        <td>' .$data[7]. '</td>
                        <td>' .$data[8]. '</td>
                    </tr>';
                ?>
                </tbody>
            </table>
            <a href="tableau_employe.php"><button type="button" class="btn btn-success">Accéder au tableau des employés</button></a>
            </div>
<?php
    mysqli_free_result($rs);
    mysqli_close($db);
?>
    </div>            
</body>
</html>