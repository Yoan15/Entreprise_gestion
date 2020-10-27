<?php

    include_once ('Batiment.php');

    class Maison extends Batiment{
        public $nbPieces;

        

        /**
         * Get the value of nbPieces
         */ 
        public function getNbPieces()
        {
                return $this->nbPieces;
        }

        /**
         * Set the value of nbPieces
         *
         * @return  self
         */ 
        public function setNbPieces($nbPieces)
        {
                $this->nbPieces = $nbPieces;

                return $this;
        }
    }

?>