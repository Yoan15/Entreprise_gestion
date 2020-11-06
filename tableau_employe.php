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
    <title>Tableau employés</title>
</head>
<body>
    <div class="container-fluid">

    <?php
    $db = mysqli_init();
    mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

    include_once 'crud.php';
    include_once 'class/Employe/Employes.php';

    // /*Ajout procédural*/

    // if (isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
    //     addEmploye();
    // }

    /*Ajout Orienté objet*/
    if(isset($_GET["action"]) && $_GET["action"] == "add" && !empty($_POST)){
        if (isset($_POST["NOEMP"]) && !Empty($_POST["NOEMP"])
            && isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){
                    
            $employes = new Employes( 
            $_POST["NOEMP"], 
            $_POST["NOM"]?$_POST["NOM"]:NULL,
            $_POST["PRENOM"]?$_POST["PRENOM"]:NULL,
            $_POST["EMPLOI"]?$_POST["EMPLOI"]:NULL,
            $_POST["SUP"]?$_POST["SUP"]:NULL,
            $_POST["EMBAUCHE"]?$_POST["EMBAUCHE"]:NULL,
            $_POST["SAL"]?$_POST["SAL"]:NULL,
            $_POST["COMM"]?$_POST["COMM"]:NULL,
            $_POST["NOSERV"]
            );
            addEmployes($employes);
        }
    }

    // /*Modification*/

    // if (isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)){
    //     modifEmploye();
    // }

    /*Modif Orienté objet*/
    if (isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)){
        if (isset($_POST["NOEMP"])&& !empty($_POST["NOEMP"])
        && isset($_POST["NOSERV"]) && !Empty($_POST["NOSERV"])){

            $employes = new Employes(
            $noemp= $_POST["NOEMP"],
            $nom= $_POST["NOM"]?"'".$_POST["NOM"]."'":NULL,
            $prenom= $_POST["PRENOM"]?"'".$_POST["PRENOM"]."'":NULL,
            $poste= $_POST["EMPLOI"]?"'".$_POST["EMPLOI"]."'":NULL,
            $sup= $_POST["SUP"]?$_POST["SUP"]:NULL,
            $embauche= $_POST["EMBAUCHE"]?"'".$_POST["EMBAUCHE"]."'":NULL,
            $sal= $_POST["SAL"]?$_POST["SAL"]:NULL,
            $comm= $_POST["COMM"]?$_POST["COMM"]:NULL,
            $serv= $_POST["NOSERV"],
            );
            modifEmployes($employes);
        }
    }


    /*Suppression procédural*/

    // if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    //     supprimeEmploye();
    // }

    /*suppression orienté objet*/
    if (isset($_GET["action"]) && $_GET["action"]=="delete") {
        $noemp=$_GET["NOEMP"];
        supprimeEmploye($noemp);
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
                        <th scope="col">NOM</th>
                        <th scope="col">PRENOM</th>
                        <th scope="col">Poste</th>
                        <th scope="col">Supérieur</th>
                        <th scope="col">Date d'EMBAUCHE</th>
                        <?php if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                            echo '<th scope="col">SaLaire</th>
                            <th scope="col">Commission</th>';    
                        } ?>
                        <th scope="col">N°Service</th>
                        <th scope="col">Détails</th>
                        <?php if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                            echo '<th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>';
                        } ?>
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

                            if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin") {
                                echo'<td>' .$data[6]. '</td>';
                                echo'<td>' .$data[7]. '</td>';
                            }
                        
                            echo'<td>' .$data[8]. '</td>';

                            echo'<td>
                                    <a href="tableau_employe.php?action=detail&NOEMP=' . $data[0] . '">
                                        <button type="button" class="btn btn-info">Détails</button>
                                    </a>
                                </td>';
                            if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin") {
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
                }
                                    
                ?>

                </tbody>
            </table>
                <?php
                    if (isset($_SESSION['username']) && ($_SESSION['profil']) == "admin"){
                        echo '<a href="formulaire.php?action=add">
                                <button type="button" class="btn btn-success">Ajouter un employé</button>
                            </a>';
                } ?>
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