<?php

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
    echo ("\n code : ".$i->getCode().", message : ".$i->getMessage());
}
try{
    $stmt = $mysqli->prepare("DELETE FROM emp2 WHERE NOEMP=1000");
    $stmt->execute();
    $mysqli->close();
} catch (mysqli_sql_exception $d) {
    echo ("\n code : ".$d->getCode().", message : ".$d->getMessage());
}
try{
    $stmt =$mysqli->prepare("SELECT * FROM emp2");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();
    return $data;
} catch (mysqli_sql_exception $s) {
    echo ("\n code : ".$s->getCode().", message : ".$s->getMessage());
}
try{
    $stmt =$mysqli->prepare("SELECT * FROM emp2 WHERE NOEMP=6002");
    $stmt->execute();
    $rs = $stmt->get_result();
    $detail = $rs->fetch_array(MYSQLI_ASSOC);
    $mysqli->close();
    return $detail;
} catch (mysqli_sql_exception $s) {
    echo ("\n code : ".$s->getCode().", message : ".$s->getMessage());
}
try{
    $stmt = $mysqli->prepare("UPDATE emp2 SET NOEMP=6002, NOM='KARAKOV', PRENOM='NONNA, EMPLOI='TEST', SUP=6000, EMBAUCHE='2020-11-27', SAL=46544, COMM=4564, NOSERV=7 WHERE NOEMP=6002");
    $stmt->execute();
}catch(mysqli_sql_exception $u) {
    echo ("\n code : ".$u->getCode().", message : ".$u->getMessage());
}
try{
    $mysqli = new mysqli ('localhost', 'yoan', 'kongo', 'employer');
    $stmt = $mysqli->prepare("select * from profil where username = yoan.deco@gmail.com");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);
    $rs->free();
    $mysqli->close();
    return $data;
}catch(mysqli_sql_exception $c){
    echo ("\n code : ".$c->getCode().", message : ".$c->getMessage());
}
?>