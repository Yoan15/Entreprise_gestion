<?php

    class Employe {

        public $noemp;
        public $nom;
        public $prenom;
        public $poste;
        public $sup;
        public $embauche;
        public $comm;
        public $serv;

        public function __construct(){

        }

        public function getNoemp() :int{
            return $this->noemp;
        }

        public function setNoemp(int $noemp) :self{
            $this->noemp = $noemp;
            return $this;
        }

        public function getNom() :string{
            return $this->nom;
        }

        public function setNom(string $nom) :self{
            $this->nom = $nom;
            return $this;
        }

        public function getPrenom() :string{
            return $this->prenom;
        }

        public function setPrenom(string $prenom) :self{
            $this->prenom = $prenom;
            return $this;
        }

        public function getPoste() :string{
            return $this->poste;
        }

        public function setPoste(string $poste) :self{
            $this->poste = $poste;
            return $this;
        }

        public function getSup() :int{
            return $this->sup;
        }

        public function setSup(int $sup) :self{
            $this->sup = $sup;
            return $this;
        }

        public function getEmbauche() :string{
            return $this->embauche;
        }

        public function setEmbauche(string $embauche) :self{
            $this->embauche = $embauche;
            return $this;
        }

        public function getComm() :int{
            return $this->comm;
        }

        public function setComm(int $comm) :self{
            $this->comm = $comm;
            return $this;
        }

        public function getServ() :int{
            return $this->serv;
        }

        public function setServ(int $serv) :self{
            $this->serv = $serv;
            return $this;
        }
    }
?>