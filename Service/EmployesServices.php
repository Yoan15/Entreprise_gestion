<?php

    include_once '../DAO/EmployesMysqliDao.php';
    require_once '../class/Employe/ServiceException.php';

    class EmployesServices{
        static function addEmployes($employes){
            try{
                EmployesMysqliDao::addEmployes($employes);
            }catch (DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function modifEmployes($employes){
            try{
                EmployesMysqliDao::modifEmployes($employes);
            }catch (DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function supprimeEmploye(int $noemp){
            try{
                EmployesMysqliDao::supprimeEmploye($noemp);
            }catch (DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function rechercheEmploye(){
            try{
                $employes = EmployesMysqliDao::rechercheEmploye();
                return $employes;
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function detailEmploye(int $noemp){
            try{
                $detail = EmployesMysqliDao::detailEmploye($noemp);
                return $detail;
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function rechercheSup(){
            try{
                $donnee = EmployesMysqliDao::rechercheSup();
                return $donnee;
            }catch(DAOException $e){
                throw new ServiceException($e->getMessage(), $e->getCode());
            }
        }

        static function compteur(){
            $compteur = new EmployesMysqliDao;
            $dateAjout = $compteur->compteur();
            return $dateAjout;
        }

        static function filtreEmploye(){
            $filtre = new EmployesMysqliDao;
            return $filtre;
        }
    }
?>