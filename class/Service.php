<?php

    class Service{

        public $noserv;
        public $service;
        public $ville;

        //public function __construct(int $noserv, string $service, string $ville){
            //$this->noserv = $noserv;
            //$this->service = $service;
            //$this->ville = $ville;
        //}

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

    $service1 = new Service();
    $service1->setNoserv(1)->setService("Direction")->setVille("Paris");

    $service2 = new Service();
    $service2->setNoserv(2)->setService("Logistique")->setVille("Roubaix");

    $service3 = new Service();
    $service3->setNoserv(3)->setService("Formation")->setVille("Villeneuve d'Ascq");

    $service4 = new Service();
    $service4->setNoserv(4)->setService("Médical")->setVille("Lille");

    echo "$service1 \n";
    echo "$service2 \n";
    echo "$service3 \n";
    echo "$service4 \n";
?>