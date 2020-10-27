<?php

    include_once ('Maison.php');

    $maison= new Maison();
    $maison->setAdresse("6 Rue de Béthune")->setSuperficie(50)->setnbPieces(9);

    echo "$maison";

?>