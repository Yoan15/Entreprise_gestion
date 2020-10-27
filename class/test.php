<?php
    /*Affichage Employé*/

    include_once ('Employe.php');

    $employe1 = new Employe();
    $employe1->setNoemp(5557)->setNom("Stark")->setPrenom("Tony")->SetPoste("Iron Man")
    ->SetSup(1000)->SetEmbauche("2020-10-27")->SetSalaire(50000)->SetComm(0)->SetServ(1);

    $employe2 = new Employe();
    $employe2->setNoemp(5558)->setNom("Potts")->setPrenom("Peper")->SetPoste("Assistante")
    ->SetSup(5557)->SetEmbauche("2020-10-27")->SetSalaire(30000)->SetComm(5000)->SetServ(2);

    $employe3 = new Employe();
    $employe3->setNoemp(5559)->setNom("Xavier")->setPrenom("Charles")->SetPoste("Professeur")
    ->SetSup(5557)->SetEmbauche("2020-10-27")->SetSalaire(30000)->SetComm(0)->SetServ(3);

    $employe4 = new Employe();
    $employe4->setNoemp(6000)->setNom("Grey")->setPrenom("Jean")->SetPoste("Scientifique")
    ->SetSup(5557)->SetEmbauche("2020-10-27")->SetSalaire(30000)->SetComm(0)->SetServ(4);

    echo "$employe1 \n";
    echo "$employe2 \n";
    echo "$employe3 \n";
    echo "$employe4 \n";


    /*Affichage Service*/

    include_once ('Service.php');

    $service1 = new Service();
    $service1->setNoserv(1)->setService("Direction")->setVille("Paris");

    $service2 = new Service();
    $service2->setNoserv(2)->setService("Logistique")->setVille("Roubaix");

    $service3 = new Service();
    $service3->setNoserv(3)->setService("Formation")->setVille("Villeneuve d'Ascq");

    $service4 = new Service();
    $service4->setNoserv(4)->setService("Médical")->setVille("Lille");

    echo "$service1 \n";
    echo "$service2 \n";
    echo "$service3 \n";
    echo "$service4 \n";
?>
