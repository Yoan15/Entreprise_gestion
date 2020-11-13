<?php

    include_once '../DAO/ServiceMysqliDao.php';

    class ServiceService extends ServiceMysqliDao{
        static function addService(Service $service){
            parent::addService($service);
        }

        static function modifService(Service $service){
            parent::modifService($service);
        }

        static function supprService(int $noserv){
            parent::supprService($noserv);
        }

        static function rechercheService(){
            parent::rechercheService();
        }
    }
?>