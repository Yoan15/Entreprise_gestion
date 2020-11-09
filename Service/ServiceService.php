<?php

    include_once 'DAO/ServiceMysqliDao.php';

    class ServiceService{
        static function addService(Service $service){
            ServiceMysqliDao::addService($service);
        }

        static function modifService(Service $service){
            ServiceMysqliDao::modifService($service);
        }

        static function supprService(int $noserv){
            ServiceMysqliDao::supprService($noserv);
        }
    }
?>