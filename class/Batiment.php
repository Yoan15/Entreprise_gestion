<?php

    class Batiment {
        public $adresse;
        public $superficie;

        public function __construct(string $adresse){
            $this->adresse = $adresse;
        }

        /**
         * Get the value of adresse
         */ 
        public function getAdresse() :string
        {
                return $this->adresse;
        }

        /**
         * Set the value of adresse
         *
         * @return  self
         */ 
        public function setAdresse(string $adresse)
        {
                $this->adresse = $adresse;

                return $this;
        }

        /**
         * Get the value of superficie
         */ 
        public function getSuperficie(): int
        {
                return $this->superficie;
        }

        /**
         * Set the value of superficie
         *
         * @return  self
         */ 
        public function setSuperficie(int $superficie)
        {
                $this->superficie = $superficie;

                return $this;
        }

        public function __toString() :string{
            return " [Adresse] :" . $this->adresse . " [Nom] :" . $this->superficie;
        }
    }

?>