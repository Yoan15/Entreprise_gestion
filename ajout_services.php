<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="formulaire.css">
    <title>Formulaire</title>
</head>
<body>
    <div class="container-fluid">
        <h1>Formulaire services</h1>
        <div class="row">
            <?php

                $db = mysqli_init();
                mysqli_real_connect($db, 'localhost', 'yoan', 'kongo','employer');

                $action="";
                $ismodif = $_GET["action"] == "modif";

                if (isset($_GET["action"]) && $_GET["action"] == "add") {
                    $action="tableau_services.php?action=add";
                    $ismodif = false;
                }

                if (isset($_GET["action"]) && $_GET["action"] == "modif") {
                    $query= 'SELECT * FROM serv2 WHERE NOSERV=' .$_GET["NOSERV"];
                    $rs = mysqli_query($db, $query);
                    $data = mysqli_fetch_array($rs);
                    $action="tableau_services.php?action=modif";
                    $ismodif = true;
                }
            ?>

            <form action="<?php echo $action; ?>" method="post">
                <div class="form col-12">
                <div class="form-group">
                        <label for="NOSERV">N°Service</label>
                        <input type="number" class="form-control" name="NOSERV" placeholder="0" value="<?php if($action == $ismodif){echo($data[0]);} ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="SERV">Service</label>
                        <input type="text" class="form-control" name="SERV" placeholder="Service" value="<?php if($action == $ismodif){echo($data[1]);} ?>">
                    </div>

                    <div class="form-group">
                        <label for="VILLE">Ville</label>
                        <input type="text" class="form-control" name="VILLE" placeholder="Ville" value="<?php if($action == $ismodif){echo($data[2]);} ?>">
                    </div>
                </div>

                    <div class="row col-12">
                        <button class="btn btn-primary" type="submit">Valider</button>
                    </div>
            </form>
        </div>
    </div>
</body>
</html>