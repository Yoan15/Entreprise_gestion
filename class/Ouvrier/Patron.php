<?php

//commun = static

class Patron extends Employe {
    private $chiffreaffaire;
    private $pourcentage;

    public function getSalaire(): float
        {
            return $this->salaire;
        }

    /**
     * Get the value of chiffreaffaire
     */ 
    public function getChiffreaffaire() : int
    {
        return $this->chiffreaffaire;
    }

    /**
     * Set the value of chiffreaffaire
     *
     * @return  self
     */ 
    public function setChiffreaffaire(int $chiffreaffaire) : self
    {
        $this->chiffreaffaire = $chiffreaffaire;

        return $this;
    }

    /**
     * Get the value of pourcentage
     */ 
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * Set the value of pourcentage
     *
     * @return  self
     */ 
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }
}

?>