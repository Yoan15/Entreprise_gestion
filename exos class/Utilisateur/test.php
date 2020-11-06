<?php

    // # -> protected
    // - -> private
    // + -> public

    include_once ('Profil.php');
    include_once ('Personne.php');

    $profilMN = new Profil(1, "MN", "Manager");
    $profilDG = new Profil(2, "DG", "Directeur Général");
    $profilCP = new Profil(3, "CP", "Chef de projet");

    $personne1 = new Personne(1, "DUPOND", "David", "d.d@gmail.com", "06000000", 1500);
    $personne2 = new Personne(2, "DUMAT", "Jacques", "j.d@gmail.com", "06101010", 1000);
    $personne3 = new Personne(3, "DUFOND", "Yanis", "y.d@gmail.com", "06202020", 10000);

    $user1 = new Utilisateur($personne1, "Dave", "123123123", "Informatique", $profilMN);
    $user2 = new Utilisateur($personne2, "jacquouille", "123456", "Informatique", $profilDG);
    $user3 = new Utilisateur($personne3, "Yanou", "456789", "Informatique", $profilCP);
?>