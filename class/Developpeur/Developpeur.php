<?php

    include_once ('Personne.php');

    class Developpeur extends Personne{
        private $specialite;

        public function __construct(int $id, string $prenom, string $nom, string $mail, string $telephone, float $salaire, int $counter,string $specialite)
        {
            parent::__construct($id, $nom, $prenom, $mail, $telephone, $salaire, $counter);
            $this->specialite = $specialite;
        }

        public function calculerSalaire(): float
        {
            return $this->salaire * 1.2;
        }

        public function afficher(){
        }

        /**
         * Get the value of specialite
         */ 
        public function getSpecialite() : string
        {
                return $this->specialite;
        }

        /**
         * Set the value of specialite
         *
         * @return  self
         */ 
        public function setSpecialite(string $specialite) : self
        {
                $this->specialite = $specialite;

                return $this;
        }

        public function __toString() : string{
            return parent::__toString(). " [SPECIALITE] : ". $this->specialite;
        }
    }
?>