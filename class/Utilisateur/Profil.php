<?php

    // # -> protected
    // - -> private
    // + -> public

    class Profil extends Utilisateur{
        private $id;
        private $code;
        private $libelle;

        public function __construct(int $id, string $code, string $libelle){
            $this->id = $id;
            $this->code = $code;
            $this->libelle = $libelle;
        }
    }

?>