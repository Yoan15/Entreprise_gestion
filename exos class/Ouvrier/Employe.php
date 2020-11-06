<?php

    abstract class Employe {
        private $matricule;
        private $nom;
        private $prenom;
        private $birthday;

        

        /**
         * Get the value of matricule
         */ 
        public function getMatricule() : int
        {
                return $this->matricule;
        }

        /**
         * Set the value of matricule
         *
         * @return  self
         */ 
        public function setMatricule(int $matricule) : self
        {
                $this->matricule = $matricule;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom() : string
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom(string $nom) : self
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of prenom
         */ 
        public function getPrenom() : string
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */ 
        public function setPrenom(string $prenom) : self
        {
                $this->prenom = $prenom;

                return $this;
        }

        /**
         * Get the value of birthday
         */ 
        public function getBirthday() : string
        {
                return $this->birthday;
        }

        /**
         * Set the value of birthday
         *
         * @return  self
         */ 
        public function setBirthday(string $birthday) : self
        {
                $this->birthday = $birthday;

                return $this;
        }

        /**
        * Get the value of salaire
        */ 
        public abstract function getSalaire() : float;

        /**
        * Set the value of salaire
        *
        * @return  self
        */ 
        public function setSalaire(float $salaire) : self
        {
            $this->salaire = $salaire;

            return $this;
        }

        public function __toString() : string {
            return "[Matricule] : ". $this->matricule . " [Nom] : ". $this->nom . " [Prenom] : ". $this->prenom 
            . " [Date de naissance] : " . $this->birthday;
        }
    }

?>