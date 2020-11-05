<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <h1>Inscription</h1>
        </div>
        <div class="row d-flex justify-content-center">
            <form action="traitement.php?action=inscription" method="POST">
                <div class="form-group">
                  <label for="InputEmail">Addresse Email</label>
                  <input type="email" class="form-control" name="username" id="InputEmail" placeholder="xx@xx.xx">
                </div>
                <div class="form-group">
                  <label for="InputPassword">Mot de passe</label>
                  <input type="password" class="form-control" name="mdp" id="InputPassword" placeholder="Mot de passe">
                </div>

                <?php if(isset($_GET['error']) && $_GET['error']=='mailused') {
                        echo '<div class="alert alert-danger col-12" role="alert">
                                <p class="text-center p-0 m-0">L\'adresse email est déjà liée à un utilisateur.</p>
                              </div>';
                  } 
                ?>
                <!--<div class="form-group">
                    <label for="FormControlSelect">Type de profil</label>
                    <select class="form-control" name="profil" id="FormControlSelect1">
                        <option></option>
                        <option>Admin</option>
                        <option>Utilisateur</option>
                    </select>
                  </div>-->
                <button type="submit" class="btn btn-primary">Soumettre</button>
                <a class="btn btn-primary" href="accueil.php" role="button">Retour à l'accueil</a>
              </form>
        </div>
    </div>
</body>
</html>