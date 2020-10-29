<?php

include_once("Personne.php");
include_once("Profil.php");

class Utilisateur extends Personne {
    private $login;
    private $password;
    private $service;
    private $profil;

    public function __construct(Personne $personne, string $login, string $password, string $service, Profil $profil)
    {
     //$this->setPrenom($personne->getPrenom());
     parent::__construct($personne->getId(), $personne->getPrenom(), $personne->getNom(),
                         $personne->getMail(), $personne->getTelephone(), $personne->getSalaire());   
     $this->login = $login;
     $this->password = $password;
     $this->service = $service; 
     $this->profil = $profil;   
    }

    public function calculerSalaire(): float
    {
        if($this->profil->getCode() == "MN"){
            return $this->salaire * 1.1;
        }elseif($this->profil->getCode() == "DG"){
            return $this->salaire * 1.4;
        }
        return $this->salaire;
    }

    public function affiche() : void{
        echo $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin() : string
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin(string $login) :self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword() :string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword(string $password) :self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of service
     */ 
    public function getService() :string
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */ 
    public function setService(string $service) : self
    {
        $this->service = $service;

        return $this;
    }

    public function __toString()
    {
        return $this->login . " " . $this->service;
    }

    /**
     * Get the value of profil
     */ 
    public function getProfil() : Profil
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */ 
    public function setProfil(Profil $profil) :self
    {
        $this->profil = $profil;

        return $this;
    }
}