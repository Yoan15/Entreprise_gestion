<?php

    class Service{

        private $noserv;
        private $serv;
        private $ville;

        public function __construct(int $noserv, string $serv, string $ville){
            $this->noserv = $noserv;
            $this->serv = $serv;
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
        public function getServ() :string{
            return $this->serv;
        }

        public function setServ(string $serv) :self{
            $this->serv = $serv;
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
            return " [Noserv] :" . $this->noserv . " [Serv] :" . $this->serv . " [Ville] :" . $this->ville;
        }
    }
?>