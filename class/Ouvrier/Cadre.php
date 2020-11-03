<?php

    include_once ('Employe.php');

    class Cadre extends Employe {
        private $indice;
        private $salaire;

        /**
         * Get the value of indice
         */ 
        public function getIndice() : int
        {
                return $this->indice;
        }

        /**
         * Set the value of indice
         *
         * @return  self
         */ 
        public function setIndice(int $indice) : self
        {
                $this->indice = $indice;

                return $this;
        }

        public function getSalaire(): float
        {
            switch ($this->indice->getIndice()) {
                case 1:
                    $salaire = 13000;
                    break;
                
                case 2:
                    $salaire = 15000;
                    break;

                case 3:
                    $salaire = 17000;
                    break;

                case 4:
                    $salaire = 20000;
                    break;
            }

            return $this->salaire;
        }

        public function __toString(): string
        {
            return parent::__toString() . " [Indice] : ". $this->indice . " [Salaire] : ". $this->getSalaire();
        }

    }

?>