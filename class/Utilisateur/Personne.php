<?php

    // # -> protected
    // - -> private
    // + -> public

    class Personne {
        protected $id;
        protected $nom;
        protected $prenom;
        protected $mail;
        protected $telephone;
        protected $salaire;

        public function __construct(int $id, string $nom, string $prenom, string $mail, string $telephone, float $salaire){
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mail = $mail;
            $this->telephone = $telephone;
            $this->salaire = $salaire;
        }

        /**
         * Get the value of id
         */ 
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId(int $id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom(): string
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom(string $nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of prenom
         */ 
        public function getPrenom(): string
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */ 
        public function setPrenom(string $prenom)
        {
                $this->prenom = $prenom;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail(): string
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail(string $mail)
        {
                $this->mail = $mail;

                return $this;
        }

        /**
         * Get the value of telephone
         */ 
        public function getTelephone(): string
        {
                return $this->telephone;
        }

        /**
         * Set the value of telephone
         *
         * @return  self
         */ 
        public function setTelephone(string $telephone)
        {
                $this->telephone = $telephone;

                return $this;
        }

        /**
         * Get the value of salaire
         */ 
        public function getSalaire(): float
        {
                return $this->salaire;
        }

        /**
         * Set the value of salaire
         *
         * @return  self
         */ 
        public function setSalaire(float $salaire)
        {
                $this->salaire = $salaire;

                return $this;
        }

        public function __toString(){
            return "[Id] : " . $this->id . " [Nom] : " . $this->nom . " [Prenom] : " . $this->prenom . " [Mail] : " . $this->mail . " [Telephone] : " 
            . $this->telephone . " [Salaire] : " . $this->salaire;
        }
    }

?>