<?php

    include_once ('Employe.php');

    class Ouvrier extends Employe {
        private $entrydate;

        /**
         * Get the value of entrydate
         */ 
        public function getEntrydate()
        {
                return $this->entrydate;
        }

        /**
         * Set the value of entrydate
         *
         * @return  self
         */ 
        public function setEntrydate($entrydate)
        {
                $this->entrydate = $entrydate;

                return $this;
        }

        public function getSalaire() : float
        {
            return $this->salaire;
        }
    }

?>