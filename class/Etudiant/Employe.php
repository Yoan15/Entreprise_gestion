<?php

    include_once ('Personne.php');

    class Employe extends Personne{

        protected $salaire;

        public function __construct(int $id, string $nom, string $prenom, float $salaire){
            parent::__construct($id, $nom, $prenom);
            $this->salaire = $salaire;
        }

        /**
         * Get the value of salaire
         */ 
        public function getSalaire() : float
        {
                return $this->salaire;
        }

        /**
         * Set the value of salaire
         *
         * @return  self
         */ 
        public function setSalaire(float $salaire)
        {
                $this->salaire = $salaire;

                return $this;
        }

        public function __toString() : string{
            return "Employe : ". parent::__toString() ."[Salaire] : ". $this->salaire . " euros";
        }
    }

?>