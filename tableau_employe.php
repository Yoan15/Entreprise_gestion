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
    <title>Tableau employés</title>
</head>
<body>
    <div class="container-fluid">

    <?php
    $db = mysqli_init();
    mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

    include 'crud.php';  

    /*Ajout*/

    if (isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
        addEmploye();
    }

    /*Modification*/

    if (isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)){
        modifEmploye();
    }


    /*Suppression*/

    if (isset($_GET["action"]) && $_GET["action"] == "delete") {
        supprimeEmploye();
    }

    /*Détails*/
    
    if (isset($_GET["action"]) && $_GET["action"] == "detail") {
        detailEmploye();
    }
?>

        <div class="row col-12">
            <h1>Tableau Employés</h1>
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
                        <th scope="col">Détails</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                /*Données Tab*/

                $rs = mysqli_query($db, 'SELECT * FROM emp2');

                $donnee = rechercheSup();
                        /*print_r($donnee);*/
                while ($data = mysqli_fetch_row($rs)) {
                    
                echo '
                <tr>';
                        echo'<td>' .$data[0]. '</td>';
                        echo'<td>' .$data[1]. '</td>';
                        echo'<td>' .$data[2]. '</td>';
                        echo'<td>' .$data[3]. '</td>';
                        echo'<td>' .$data[4]. '</td>';
                        echo'<td>' .$data[5]. '</td>';
                        echo'<td>' .$data[6]. '</td>';
                        echo'<td>' .$data[7]. '</td>';
                        echo'<td>' .$data[8]. '</td>';
                        echo'<td>
                            <a href="tableau_employe.php?action=detail&NOEMP=' . $data[0] . '">
                                <button type="button" class="btn btn-info">Détails</button>
                            </a>
                        </td>';
                        echo'<td>
                            <a href="formulaire.php?action=modif&NOEMP=' . $data[0] . '">
                                <button type="button" class="btn btn-warning">Modifier</button>
                            </a>
                        </td>';
                        
                    $trouve = false;
                    for ($i=0; $i < count($donnee); $i++) { 
                        if ($donnee[$i]["SUP"] == $data[0]) {
                            $trouve=true;
                        }
                    }
                    if (!$trouve) {
                        echo'<td>
                                <a href="tableau_employe.php?action=delete&NOEMP=' . $data[0] . '">
                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                </a>
                            </td>
                        </tr>';
                    }
                }            
                ?>

                </tbody>
            </table>
                <a href="formulaire.php?action=add">
                    <button type="button" class="btn btn-success">Ajouter un employé</button>
                </a>
                <a href="tableau_services.php">
                    <button type="button" class="btn btn-success">Accéder au tableau des services</button>
                </a>
                <a href="deconnexion.php">
                    <button type="button" class="btn btn-success">Se déconnecter</button>
                </a>
        </div>
    </div>

    <?php
        mysqli_free_result($rs);
        mysqli_close($db);
    ?>

</body>
</html>