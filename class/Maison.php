<?php

    include_once ('Batiment.php');

    class Maison extends Batiment{
        public $nbPieces;

        public function __construct(string $adresse, int $superficie, int $nbPieces){
            $this->adresse = $adresse;
            $this->superficie = $superficie;
            $this->nbPieces = $nbPieces;
        }

        /**
         * Get the value of nbPieces
         */ 
        public function getNbPieces(): int
        {
                return $this->nbPieces;
        }

        /**
         * Set the value of nbPieces
         *
         * @return  self
         */ 
        public function setNbPieces(int $nbPieces)
        {
                $this->nbPieces = $nbPieces;

                return $this;
        }

        public function __toString() :string{
            return " [Adresse] :" . $this->adresse . " [Nom] :" . $this->superficie . " [nbPieces] :" . $this->nbPieces;
        }
    }

?>