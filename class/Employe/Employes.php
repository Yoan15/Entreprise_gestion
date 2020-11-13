<?php

    class Employes{

        private $noemp;
        private $nom;
        private $prenom;
        private $poste;
        private $sup;
        private $embauche;
        private $sal;
        private $comm;
        private $serv;

        public function __construct(int $noemp, ?string $nom, ?string $prenom, ?string $poste, ?int $sup, ?string $embauche, ?float $sal, ?float $comm, int $serv){
            $this->noemp = $noemp;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->poste = $poste;
            $this->sup = $sup;
            $this->embauche = $embauche;
            $this->sal = $sal;
            $this->comm = $comm;
            $this->serv = $serv;
        }


        /*Numéro d'employé*/
        public function getNoemp() :int{
            return $this->noemp;
        }

        public function setNoemp(int $noemp) :self{
            $this->noemp = $noemp;
            return $this;
        }

        /*Nom*/
        public function getNom() :?string{
            return $this->nom;
        }

        public function setNom(?string $nom) :self{
            $this->nom = $nom;
            return $this;
        }

        /*Prenom*/
        public function getPrenom() :?string{
            return $this->prenom;
        }

        public function setPrenom(?string $prenom) :self{
            $this->prenom = $prenom;
            return $this;
        }

        /*Poste*/
        public function getPoste() :?string{
            return $this->poste;
        }

        public function setPoste(?string $poste) :self{
            $this->poste = $poste;
            return $this;
        }

        /*Supérieur*/
        public function getSup() :?int{
            return $this->sup;
        }

        public function setSup(?int $sup) :self{
            $this->sup = $sup;
            return $this;
        }

        /*Date d'embauche*/
        public function getEmbauche() :?string{
            return $this->embauche;
        }

        public function setEmbauche(?string $embauche) :self{
            $this->embauche = $embauche;
            return $this;
        }

        /*Salaire*/
        public function getSal() :?float{
            return $this->sal;
        }

        public function setSal(?float $sal) :self{
            $this->sal = $sal;
            return $this;
        }

        /*Commission*/
        public function getComm() :?float{
            return $this->comm;
        }

        public function setComm(?float $comm) :self{
            $this->comm = $comm;
            return $this;
        }

        /*N° de Service*/
        public function getNoserv() :int{
            return $this->serv;
        }

        public function setNoserv(int $serv) :self{
            $this->serv = $serv;
            return $this;
        }

        public function __toString() :string{
            return " [Noemp] :" . $this->noemp . " [Nom] :" . $this->nom . " [Prenom] :" . $this->prenom . 
            " [Poste] :" . $this->poste . " [Sup] :" . $this->sup . " [Embauche] :" . $this->embauche . 
            " [Salaire] :" . $this->sal . " [Comm] :" . $this->comm . " [Noserv] :" . $this->serv;
        }
    }
?>