<?php

    // # -> protected
    // - -> private
    // + -> public

    class Utilisateur{
        private $login;
        private $password;
        private $service;

        public function __construct(string $login, string $password, string $service){
            $this->login = $login;
            $this->password = $password;
            $this->service = $service;
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
        public function setLogin(string $login)
        {
                $this->login = $login;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword() : string
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword(string $password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of service
         */ 
        public function getService() : string
        {
                return $this->service;
        }

        /**
         * Set the value of service
         *
         * @return  self
         */ 
        public function setService(string $service)
        {
                $this->service = $service;

                return $this;
        }

        public function __toString() : string{
            return "[Login] : " . $this->id . " [Password] : " . $this->password . " [Service] : " . $this->service; 
        }
    }

?>