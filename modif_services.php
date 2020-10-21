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
            <form action="tableau_services.php?action=add" method="post">
                <div class="form col-12">
                <div class="form-group">
                        <label for="NOSERV">N°Service</label>
                        <input type="text" class="form-control" id="NOSERV" placeholder="0" required>
                    </div>

                    <div class="form-group">
                        <label for="SERVICE">Service</label>
                        <input type="text" class="form-control" id="SERVICE" placeholder="Service">
                    </div>

                    <div class="form-group">
                        <label for="VILLE">Ville</label>
                        <input type="text" class="form-control" id="VILLE" placeholder="Ville">
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