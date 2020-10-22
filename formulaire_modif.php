<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="formulaire.css">
    <title>Formulaire</title>
</head>
<body>
    <div class="container-fluid">
    <?php
        $db = mysqli_init();
        mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

        if (isset($_GET["action"]) && $_GET["action"] == "modif"){
            $query= 'SELECT * FROM emp2 WHERE NOEMP=' .$_GET["NOEMP"];
            $rs = mysqli_query($db, $query);
            $data = mysqli_fetch_array($rs);
        }
    ?>

        <h1>Formulaire</h1>
        <div class="row">
            <form action="tableau_employe.php?action=modif" method="post">
                <div class="form col-12">
                    <label for="NOEMP">N°Employé</label>
                    <input type="number" class="form-control" name="NOEMP" placeholder="0000" value="<?php echo($data[0]); ?>" required>

                    <div class="form-group">
                        <label for="NOM">Nom</label>
                        <input type="text" class="form-control" name="NOM" placeholder="Nom" value="<?php echo($data[1]); ?>">
                    </div>

                    <div class="form-group">
                        <label for="PRENOM">Prenom</label>
                        <input type="text" class="form-control" name="PRENOM" placeholder="Prenom" value="<?php echo($data[2]); ?>">
                    </div>

                    <div class="form-group">
                        <label for="EMPLOI">Poste</label>
                        <input type="text" class="form-control" name="EMPLOI" placeholder="Poste" value="<?php echo($data[3]); ?>">
                    </div>

                    <div class="form-group">
                        <label for="SUP">Supérieur</label>
                        <input type="number" class="form-control" name="SUP" placeholder="0000" value="<?php echo($data[4]); ?>">
                    </div>

                    <div class="form-group">
                        <label for="EMBAUCHE">Date embauche</label>
                        <input type="date" class="form-control" name="EMBAUCHE" value="<?php echo($data[5]); ?>">
                    </div>

                    <div class="form-group">
                        <label for="SAL">Salaire</label>
                        <input type="number" class="form-control" name="SAL" placeholder="00000" value="<?php echo($data[6]); ?>">
                    </div>

                    <div class="form-group">
                        <label for="COMM">Commission</label>
                        <input type="number" class="form-control" name="COMM" placeholder="0" value="<?php echo($data[7]); ?>">
                    </div>

                    <div class="form-group">
                        <label for="NOSERV">N°Service</label>
                        <input type="number" class="form-control" name="NOSERV" placeholder="0" value="<?php echo($data[8]); ?>" required>
                    </div>
                </div>

                    <div class="row col-12">
                        <button class="btn btn-primary" type="submit">Valider formulaire</button>
                    </div>
            </form>
        </div>
    </div>

    <?php
        mysqli_free_result($rs);
        mysqli_close($db);
    ?>
</body>
</html>