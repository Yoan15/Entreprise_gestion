<?php

    class Batiment {
        private $adresse;
        private $superficie;

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
        public function getSuperficie(): float
        {
                return $this->superficie;
        }

        /**
         * Set the value of superficie
         *
         * @return  self
         */ 
        public function setSuperficie(float $superficie)
        {
                $this->superficie = $superficie;

                return $this;
        }

        public function __toString() :string{
            return "[Adresse] :" . $this->adresse;
        }
    }

?>