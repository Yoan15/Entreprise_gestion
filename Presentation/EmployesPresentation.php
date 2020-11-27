<?php

function head(){
    echo'<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Tableau employés</title>
</head>
<body>
    <div class="container-fluid">';
}

function afficherErreurAjout($errorCode=null){
    if ($errorCode && $errorCode == 1062){
        echo "<div class='alert alert-danger'>Employé déjà existant!</div>";
    }
    
}

function afficherErreurUpdate($errorCode=null){
    if ($errorCode && $errorCode == 1054 || $errorCode == 1064){
        echo "<div class='alert alert-danger'>Erreur lors de la mise à jour de l'employé ! Veuillez réessayer ultérieurement.</div>";
    }
}

function afficherErreurSuppr($errorCode=null){
    if ($errorCode && $errorCode == 1451){
        echo "<div class='alert alert-danger'>Impossible de supprimer cet employé !</div>";
    }
}

function afficherErreurSelect($errorCode=null){
    if ($errorCode && $errorCode == 1064){
        echo "<div class='alert alert-danger'>Impossible de récupérer les informations!</div>";
    }
}

function enteteTab($isAdmin){
    echo'
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
                <th scope="col">Date d\'embauche</th>';
                if ($isAdmin) {
                    echo '<th scope="col">Salaire</th>
                    <th scope="col">Commission</th>';
                }
                echo'<th scope="col">N°Service</th>
                <th scope="col">Détails</th>';
                if ($isAdmin) {
                    echo '<th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>';
                }
                echo'</tr>
                </thead>
                ';
}

function corpsTab($data, $isAdmin){
    echo '<tr>';
    echo'<td>' .$data["NOEMP"]. '</td>';
    echo'<td>' .$data["NOM"]. '</td>';
    echo'<td>' .$data["PRENOM"]. '</td>';
    echo'<td>' .$data["EMPLOI"]. '</td>';
    echo'<td>' .$data["SUP"]. '</td>';
    echo'<td>' .$data["EMBAUCHE"]. '</td>';
    if ($isAdmin) {
        echo'<td>' .$data["SAL"]. '</td>';
        echo'<td>' .$data["COMM"]. '</td>';
    }
    echo'<td>' .$data["NOSERV"]. '</td>';
}

function boutonDetail($data){
    echo'<td>
            <a href="tableau_employeControlleur.php?action=detail&NOEMP=' . $data["NOEMP"] . '">
                <button type="button" class="btn btn-info">Détails</button>
            </a>
        </td>';
}

function afficherDetail($detail, $isAdmin){
    echo'Mon numéro d\'employé est le '.$detail["NOEMP"].' mon nom est '.$detail["NOM"].', mon prénom est '.$detail["PRENOM"].', je suis '.$detail["EMPLOI"].', le numéro d\'employé de mon supérieur est le '.$detail["SUP"].' 
    je suis dans l\'entreprise depuis le '.$detail["EMBAUCHE"].'';
    if ($isAdmin) {
        echo', mon salaire est de '.$detail["SAL"].', je touche une commission de '.$detail["COMM"].'';
    }
    echo', je fais parti du service n° '.$detail["NOSERV"].'.</br>';
    echo'<a href="tableau_employeControlleur.php"><button type="button" class="btn btn-success">cacher les détails</button></a>';
}

function boutonModif($data, $isAdmin){
    if ($isAdmin) {
    echo'<td>
        <a href="../formulaire.php?action=modif&NOEMP=' . $data["NOEMP"] . '">
            <button type="button" class="btn btn-warning">Modifier</button>
        </a>
        </td>';
    }
}

function boutonSuppr($data, $isAdmin, $donnee){
    if ($isAdmin) {
         $trouve = false;
         for ($i=0; $i < count($donnee); $i++) { 
             if ($donnee[$i]["SUP"] == $data["NOEMP"]) {
                 $trouve = true;
             }
         }
         if (!$trouve) {
            echo'<td>
            <a href="tableau_employeControlleur.php?action=delete&NOEMP=' . $data["NOEMP"] . '">
                <button type="button" class="btn btn-danger">Supprimer</button>
            </a>
        </td>';
        }
        echo'</tr>';
    }
}

function finTab(){
    echo '
        </table>';
}

function boutonAdd(){
    echo '<a href="../formulaire.php?action=add">
            <button type="button" class="btn btn-success">Ajouter un employé</button>
        </a>';
}

function boutonsLiens(){
    echo '<a href="tableau_servicesControlleur.php">
    <button type="button" class="btn btn-success">Accéder au tableau des services</button>
</a>
<a href="../deconnexion.php">
    <button type="button" class="btn btn-success">Se déconnecter</button>
</a>';
}

function finPage(){
    echo '</div>
        </div>
        </body>
        </html>';
}

function afficherEmployes($data, $isAdmin, $donnee){
    corpsTab($data, $isAdmin);
    boutonDetail($data);
    boutonModif($data, $isAdmin);
    boutonSuppr($data, $isAdmin, $donnee);
    finPage();
}
?>