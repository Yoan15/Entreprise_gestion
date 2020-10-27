<?php

    class Service{

        public $noserv;
        public $service;
        public $ville;

        public function getNoserv() :int{
            return $this->noserv;
        }

        public function setNoserv(int $noserv) :self{
            $this->noserv = $noserv;
            return $this;
        }

        public function getService() :string{
            return $this->service;
        }

        public function setService(string $service) :self{
            $this->service = $service;
            return $this;
        }

        public function getVille() :string{
            return $this->ville;
        }

        public function setVille(string $ville) :self{
            $this->ville = $ville;
            return $this;
        }
    }
?>