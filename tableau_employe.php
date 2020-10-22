<!DOCTYPE html>
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
        if (isset($_POST["NOEMP"])&& !empty($_POST["NOEMP"])){

            $noemp= $_POST["NOEMP"]?$_POST["NOEMP"]: "NULL";
            $nom= $_POST["NOM"]?"'".$_POST["NOM"]."'":"NULL";
            $prenom= $_POST["PRENOM"]?"'".$_POST["PRENOM"]."'":"NULL";
            $poste= $_POST["EMPLOI"]?"'".$_POST["EMPLOI"]."'":"NULL";
            $sup= $_POST["SUP"]?$_POST["SUP"]:"NULL";
            $embauche= $_POST["EMBAUCHE"]?"'".$_POST["EMBAUCHE"]."'":"NULL";
            $sal= $_POST["SAL"]?$_POST["SAL"]:"NULL";
            $comm= $_POST["COMM"]?$_POST["COMM"]:"NULL";
            $serv= $_POST["NOSERV"]?$_POST["NOSERV"]: "NULL";

        $rs = mysqli_query($db,"UPDATE emp2 SET NOM=$nom, PRENOM=$prenom, SUP=$sup, EMPLOI=$poste, EMBAUCHE=$embauche, SAL=$sal, COMM=$comm, NOSERV=$serv WHERE NOEMP={$_POST["NOEMP"]}");
        }
    }


    /*Suppression*/

    if (isset($_GET["action"]) && $_GET["action"] == "delete") {
        supprimeEmploye();
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

                    while ($data = mysqli_fetch_row($rs)) {
                        
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
                            <td>
                                <a href="detail.php?action=detail&NOEMP=' . $data[0] . '">
                                    <button type="button" class="btn btn-info">Détails</button>
                                </a>
                            </td>
                            <td>
                                <a href="formulaire.php?action=modif&NOEMP=' . $data[0] . '">
                                    <button type="button" class="btn btn-warning">Modifier</button>
                                </a>
                            </td>
                            <td>
                                <a href="tableau_employe.php?action=delete&NOEMP=' . $data[0] . '">
                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                </a>
                            </td>
                    </tr>';
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
        </div>
    </div>

    <?php
        mysqli_free_result($rs);
        mysqli_close($db);
    ?>

</body>
</html>