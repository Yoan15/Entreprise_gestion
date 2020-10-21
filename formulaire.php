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
        <h1>Formulaire</h1>
        <div class="row">
            <form action="tableau_employe.php?action=add" method="post">
                <div class="form col-12">
                    <label for="NOEMP">N°Employé</label>
                    <input type="text" class="form-control" id="NOEMP" placeholder="0000" required>

                    <div class="form-group">
                        <label for="NOM">Nom</label>
                        <input type="text" class="form-control" id="NOM" placeholder="NOM">
                    </div>

                    <div class="form-group">
                        <label for="PRENOM">Prenom</label>
                        <input type="text" class="form-control" id="PRENOM" placeholder="PRENOM">
                    </div>

                    <div class="form-group">
                        <label for="EMPLOI">Poste</label>
                        <input type="text" class="form-control" id="EMPLOI" placeholder="EMPLOI">
                    </div>

                    <div class="form-group">
                        <label for="SUP">Supérieur</label>
                        <input type="text" class="form-control" id="SUP" placeholder="0000">
                    </div>

                    <div class="form-group">
                        <label for="EMBAUCHE">Date d'embauche</label>
                        <input type="date" class="form-control" id="EMBAUCHE">
                    </div>

                    <div class="form-group">
                        <label for="SAL">Salaire</label>
                        <input type="text" class="form-control" id="SAL" placeholder="00000">
                    </div>

                    <div class="form-group">
                        <label for="COMM">Commission</label>
                        <input type="text" class="form-control" id="COMM" placeholder="0">
                    </div>

                    <div class="form-group">
                        <label for="NOSERV">N°Service</label>
                        <input type="text" class="form-control" id="NOSERV" placeholder="0" required>
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