<?php

    /*Affichage Batiment*/

    include_once ('Batiment.php');

    $batiment = new Batiment("46 rue du pont");

    echo "$batiment \n";

    /*Affichage Maison*/

    include_once ('Maison.php');

    $maison = new Maison($batiment->getAdresse(), 70, 7);
    
    var_dump($maison);

?>