<?php

include_once ('Personne.php');

    class Manager extends Personne{
        private $service;

        public function __construct(int $id, string $prenom, string $nom, string $mail, string $telephone, float $salaire, int $counter,string $service)
        {
            parent::__construct($id, $nom, $prenom, $mail, $telephone, $salaire, $counter);
            $this->service = $service;
        }

        public function calculerSalaire(): float
        {
            return $this->salaire * 1.35;
        }
        
        public function afficher() : void{
            echo $this;
        }

        /**
         * Get the value of service
         */ 
        public function getService() : string
        {
                return $this->service;
        }

        /**
         * Set the value of service
         *
         * @return  self
         */ 
        public function setService(string $service): self
        {
                $this->service = $service;

                return $this;
        }

        public function __toString(): string{
            return parent::__toString() . " [SERVICE] : " . $this->service;
        }
    }

?>