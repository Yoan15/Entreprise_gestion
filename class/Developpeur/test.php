<?php

    include_once ('Personne.php');
    include_once ('Developpeur.php');
    include_once ('Manager.php');

    $developpeur1 = new Developpeur(1, "Martin", "SALIM", "m.s@gmail.com", "0611111111", 1000, 0,"PHP");
    $developpeur2 = new Developpeur(2, "Will", "COLLINS", "w.c@gmail.com", "0622222222", 1500,  0,"JS");
    
    $manager1 = new Manager(3, "Jean", "LACHGAR", "j.l@gmail.com", "0633333333", 3000, 0,"Informatique");
    $manager2 = new Manager(4, "Quentin", "VALENTIN", "q.v@gmail.com", "0644444444", 2000, 0,"Logistique");

    echo "$developpeur1 \n";
    echo "$developpeur2 \n";
    echo "$manager1 \n";
    echo "$manager2 \n";
    echo Personne::$counter;



?>