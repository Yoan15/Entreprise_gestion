<?php

class Voiture {
    public $marque;
    public $modele;



    /**
     * Get the value of marque
     */ 
    public function getMarque() : string
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque(string $marque) : self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get the value of modele
     */ 
    public function getModele() : string
    {
        return $this->modele;
    }

    /**
     * Set the value of modele
     *
     * @return  self
     */ 
    public function setModele(string $modele) : self
    {
        $this->modele = $modele;

        return $this;
    }
}

?>