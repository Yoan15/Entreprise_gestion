<?php

require_once "InsertException.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
$mysqli= new mysqli('localhost', 'yoan', 'kongo','employer');
} catch (mysqli_sql_exception $e) {
    echo ("code : ".$e->getCode().", message : ".$e->getMessage());
}
try{
    $stmt = $mysqli->prepare("INSERT INTO emp2 (NOEMP, NOM, PRENOM, EMPLOI, SUP, EMBAUCHE, SAL, COMM, NOSERV) 
    VALUES (6002,'KARAKOV','NONNA','TEST',6000,'2020-11-26',25000,5000,8)");
    $stmt->execute();
    $mysqli->close();
} catch (mysqli_sql_exception $i) {
    echo ("code : ".$i->getCode().", message : ".$i->getMessage());
}
try{

} catch () {
    
}
?>