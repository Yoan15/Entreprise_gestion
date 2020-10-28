<?php

include_once ('Employe.php');

    class Professeur extends Employe{

        private $specialite;

        public function __construct(int $id, string $nom, string $prenom, float $salaire, string $specialite){
            parent::__construct($id, $nom, $prenom, $salaire);
            $this->specialite = $specialite;
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
        public function setSpecialite(string $specialite)
        {
                $this->specialite = $specialite;

                return $this;
        }

        public function __toString() : string{
            return "Professeur : ". parent::__toString() ."[Specialite] : ". $this->specialite;
        }
    }

?>