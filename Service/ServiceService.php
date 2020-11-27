<?php

    include_once '../DAO/ServiceMysqliDao.php';
    require_once '../class/Employe/ServiceException.php';

    class ServiceService{
        static function addService(Service $service){
            try{
                ServiceMysqliDao::addService($service);
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
            
        }

        static function modifService(Service $service){
            try{
                ServiceMysqliDao::modifService($service);
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
            
        }

        static function supprService(int $noserv){
            try{
                ServiceMysqliDao::supprService($noserv);
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function detailService(int $noserv){
            try{
                $detail = ServiceMysqliDao::detailService($noserv);
                return $detail;
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function rechercheService(){
            try{
                $service = ServiceMysqliDao::rechercheService();
                return $service;
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function rechercheServEmp(){
            try{
                $donnee = ServiceMysqliDao::rechercheServEmp();
                return $donnee;
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }
    }
?>