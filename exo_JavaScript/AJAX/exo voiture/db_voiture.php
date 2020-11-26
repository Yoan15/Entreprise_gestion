<?php

    include ("Voiture.php");
    $voitures = [new Voiture('TOYOTA', 'SUPRAMK4'), 
    new Voiture('TOYOTA', 'MIRAI'), 
    new Voiture('TOYOTA', 'COROLLA'), 
    new Voiture('BMW', 'M5'), 
    new Voiture('BMW', 'SERIE4'), 
    new Voiture('BMW', 'Z4'), 
    new Voiture('CHEVROLET', 'CAMARO'), 
    new Voiture('CHEVROLET', 'SPARK'),
    new Voiture('CHEVROLET', 'CORVETTE')];
    
    if(!empty($_GET) && isset($_GET["marque"]) && isset($_GET["modele"])){
        $voituresRetournees = filterVoitureSelonMarqueEtModele($voitures, $_GET["marque"], $_GET["modele"]);
    } elseif (empty($_GET)){
        // Exécuté uniquement dans le cas où je veux mettre à jour mon tableau
        $voituresRetournees = $voitures;
    }elseif(isset($_GET["marque"])){
        $voituresRetournees = filterVoitureSelonMarqueEtModele($voitures, $_GET["marque"]);
    }
    echo json_encode($voituresRetournees);
    
    function filterVoitureSelonMarqueEtModele(array $voitures, string $marque, string $modele=null) : array {
        $voituresRetournees = [];
        foreach ($voitures as $voiture) {
            if($modele && $marque && $marque == $voiture->marque && $modele == $voiture->modele){
                $voituresRetournees[] = $voiture;
            } elseif(!$modele && $marque && $marque == $voiture->marque){
                $voituresRetournees[] = $voiture;
            } 
        }
        return $voituresRetournees;
    }
?>