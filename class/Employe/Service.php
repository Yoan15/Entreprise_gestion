<?php

    class Service{

        public $noserv;
        public $service;
        public $ville;

        public function __construct(int $noserv, string $service, string $ville){
            $this->noserv = $noserv;
            $this->service = $service;
            $this->ville = $ville;
        }

        /*N° de service*/
        public function getNoserv() :int{
            return $this->noserv;
        }

        public function setNoserv(int $noserv) :self{
            $this->noserv = $noserv;
            return $this;
        }

        /*Nom du service*/
        public function getService() :string{
            return $this->service;
        }

        public function setService(string $service) :self{
            $this->service = $service;
            return $this;
        }

        /*Ville*/
        public function getVille() :string{
            return $this->ville;
        }

        public function setVille(string $ville) :self{
            $this->ville = $ville;
            return $this;
        }

        public function __toString() :string{
            return " [Noserv] :" . $this->noserv . " [Service] :" . $this->service . " [Ville] :" . $this->ville;
        }
    }
?>