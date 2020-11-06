<?php

    include_once ('Employe.php');
    include_once ('Cadre.php');

    /*Employés*/
    $employe1 = new Employe();
    $employe1->setMatricule(1000)->setNom("A")->setPrenom("B")->setBirthday("1980-12-10");
    $employe1 = new Employe();
    $employe1->setMatricule(1100)->setNom("C")->setPrenom("D")->setBirthday("1990-07-19");
    $employe1 = new Employe();
    $employe1->setMatricule(1200)->setNom("E")->setPrenom("F")->setBirthday("1975-11-28");

    /*Cadres*/
    $cadre1 = new Cadre();
    $cadre1->setIndice(1)->getSalaire($salaire);

    /*Ouvriers*/


    /*Patrons*/


    echo $cadre1;

    //$dateDiff = $date->diff($date1)->y
    //$date = new DateTime();
    //var_dump($date->diff($date1)->y);
?>