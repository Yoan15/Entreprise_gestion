<?php

    include_once ('Personne.php');
    include_once ('Etudiant.php');
    include_once ('Employe.php');
    include_once ('Professeur.php');

    $personne1 = new Personne(100, "BODARD", "Yanis");
    $etudiant1 = new Etudiant($personne1->getId(), $personne1->getNom(), $personne1->getPrenom(), "84507699");
    $personne2 = new Personne(101, "DUBOIS", "Quentin");
    $etudiant2 = new Etudiant($personne2->getId(), $personne2->getNom(), $personne2->getPrenom(), "97182573");

    $personne3 = new Personne(1000, "DUPONT", "Bernard");
    $employe1 = new Employe($personne3->getId(), $personne3->getNom(), $personne3->getPrenom(), 8000.0);
    $personne4 = new Personne(1001, "FERNAND", "Paul");
    $employe2 = new Employe($personne4->getId(), $personne4->getNom(), $personne4->getPrenom(), 9975.0);

    $employe3 = new Employe(2000, "XAVIER", "Charles", 5500.0);
    $professeur1 = new Professeur($employe3->getId(), $employe3->getNom(), $employe3->getPrenom(), $employe3->getSalaire(), "Python");
    $employe4 = new Employe(2001, "PETIT", "Lucas", 5200.0);
    $professeur2 = new Professeur($employe4->getId(), $employe4->getNom(), $employe4->getPrenom(), $employe4->getSalaire(), "PHP");

    echo "$etudiant1 \n";
    echo "$etudiant2 \n";

    echo "$employe1 \n";
    echo "$employe2 \n";

    echo "$professeur1 \n";
    echo "$professeur2 \n";
?>