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
        <h1>Formulaire</h1>
        <div class="row">
            <form action="tableau_employe.php?action=add" method="post">
                <div class="form col-12">
                    <label for="NOEMP">N°Employé</label>
                    <input type="number" class="form-control" name="NOEMP" placeholder="0000" required>

                    <div class="form-group">
                        <label for="NOM">Nom</label>
                        <input type="text" class="form-control" name="NOM" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <label for="PRENOM">Prenom</label>
                        <input type="text" class="form-control" name="PRENOM" placeholder="Prenom">
                    </div>

                    <div class="form-group">
                        <label for="EMPLOI">Poste</label>
                        <input type="text" class="form-control" name="EMPLOI" placeholder="Poste">
                    </div>

                    <div class="form-group">
                        <label for="SUP">Supérieur</label>
                        <input type="number" class="form-control" name="SUP" placeholder="0000">
                    </div>

                    <div class="form-group">
                        <label for="EMBAUCHE">Date embauche</label>
                        <input type="date" class="form-control" name="EMBAUCHE">
                    </div>

                    <div class="form-group">
                        <label for="SAL">Salaire</label>
                        <input type="number" class="form-control" name="SAL" placeholder="00000">
                    </div>

                    <div class="form-group">
                        <label for="COMM">Commission</label>
                        <input type="number" class="form-control" name="COMM" placeholder="0">
                    </div>

                    <div class="form-group">
                        <label for="NOSERV">N°Service</label>
                        <input type="number" class="form-control" name="NOSERV" placeholder="0" required>
                    </div>
                </div>

                    <div class="row col-12">
                        <button class="btn btn-primary" type="submit">Valider formulaire</button>
                    </div>
            </form>
        </div>
    </div>
</body>
</html>