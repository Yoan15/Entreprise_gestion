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

        //public function __construct(int $noemp, string $nom, string $prenom, string $poste, int $sup, 
        //string $embauche, int $comm, int $serv){
            //$this->noemp = $noemp;
            //$this->nom = $nom;
            //$this->prenom = $prenom;
            //$this->poste = $poste;
            //$this->sup = $sup;
            //$this->embauche = $embauche;
            //$this->comm = $comm;
            //$this->serv = $serv;
        //}


        /*Numéro d'employé*/
        public function getNoemp() :int{
            return $this->noemp;
        }

        public function setNoemp(int $noemp) :self{
            $this->noemp = $noemp;
            return $this;
        }

        /*Nom*/
        public function getNom() :string{
            return $this->nom;
        }

        public function setNom(string $nom) :self{
            $this->nom = $nom;
            return $this;
        }

        /*Prenom*/
        public function getPrenom() :string{
            return $this->prenom;
        }

        public function setPrenom(string $prenom) :self{
            $this->prenom = $prenom;
            return $this;
        }

        /*Poste*/
        public function getPoste() :string{
            return $this->poste;
        }

        public function setPoste(string $poste) :self{
            $this->poste = $poste;
            return $this;
        }

        /*Supérieur*/
        public function getSup() :int{
            return $this->sup;
        }

        public function setSup(int $sup) :self{
            $this->sup = $sup;
            return $this;
        }

        /*Date d'embauche*/
        public function getEmbauche() :string{
            return $this->embauche;
        }

        public function setEmbauche(string $embauche) :self{
            $this->embauche = $embauche;
            return $this;
        }

        /*Salaire*/
        public function getSalaire() :int{
            return $this->sal;
        }

        public function setSalaire(int $sal) :self{
            $this->sal = $sal;
            return $this;
        }

        /*Commission*/
        public function getComm() :int{
            return $this->comm;
        }

        public function setComm(int $comm) :self{
            $this->comm = $comm;
            return $this;
        }

        /*N° de Service*/
        public function getServ() :int{
            return $this->serv;
        }

        public function setServ(int $serv) :self{
            $this->serv = $serv;
            return $this;
        }

        public function __toString() :string{
            return " [Noemp] :" . $this->noemp . " [Nom] :" . $this->nom . " [Prenom] :" . $this->prenom . 
            " [Poste] :" . $this->poste . " [Sup] :" . $this->sup . " [Embauche] :" . $this->embauche . 
            " [Salaire] :" . $this->sal . " [Comm] :" . $this->comm . " [Serv] :" . $this->serv;
        }
    }

    $employe1 = new Employe();
    $employe1->setNoemp(5557)->setNom("Stark")->setPrenom("Tony")->SetPoste("Iron Man")
    ->SetSup(1000)->SetEmbauche("2020-10-27")->SetSalaire(50000)->SetComm(0)->SetServ(1);

    $employe2 = new Employe();
    $employe2->setNoemp(5558)->setNom("Potts")->setPrenom("Peper")->SetPoste("Assistante")
    ->SetSup(5557)->SetEmbauche("2020-10-27")->SetSalaire(30000)->SetComm(5000)->SetServ(2);

    $employe3 = new Employe();
    $employe3->setNoemp(5559)->setNom("Xavier")->setPrenom("Charles")->SetPoste("Professeur")
    ->SetSup(5557)->SetEmbauche("2020-10-27")->SetSalaire(30000)->SetComm(0)->SetServ(3);

    $employe4 = new Employe();
    $employe4->setNoemp(6000)->setNom("Grey")->setPrenom("Jean")->SetPoste("Scientifique")
    ->SetSup(5557)->SetEmbauche("2020-10-27")->SetSalaire(30000)->SetComm(0)->SetServ(4);

    echo "$employe1 \n";
    echo "$employe2 \n";
    echo "$employe3 \n";
    echo "$employe4 \n";
?>