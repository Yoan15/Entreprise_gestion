<?php

// Tips pour le travail à faire :
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// nom_exception mysqli: mysqli_sql_exception 

require_once("DivisionByZeroException.php");
require_once("NegativeNumberException.php");
require_once("TotoException.php");

require("fonctions.php");



$a =  readline("Entrez un nombre :");
$b =  readline("Entrez un nombre différent de 0 :");

try {
    division($a, $b);
    
}catch(NegativeNumberException $nne){
    echo "Saisissez un nombre positif";
}catch(DivisionByZeroException $dze){
    echo "Saisissez un nombre DIFFERENT DE ZERO";
}catch(TotoException $te){
    echo "Un problème est survenu.";
}catch(Exception $e){
        echo "Problème technique, réessayez ultérieurement.";
} finally {
    echo "\n Voulez-vous réessayer ?";
}




