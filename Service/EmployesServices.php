<?php

    include_once '../DAO/EmployesMysqliDao.php';

    class EmployesServices{
        static function addEmployes($employes){
            EmployesMysqliDao::addEmployes($employes);
        }

        static function modifEmployes($employes){
            EmployesMysqliDao::modifEmployes($employes);
        }

        static function supprimeEmploye(int $noemp){
            EmployesMysqliDao::supprimeEmploye($noemp);
        }

        static function rechercheEmploye(){
            $employes = EmployesMysqliDao::rechercheEmploye();
            return $employes;
        }

        static function detailEmploye(int $noemp){
            $detail = EmployesMysqliDao::detailEmploye($noemp);
            return $detail;
        }

        static function rechercheSup(){
            $donnee = EmployesMysqliDao::rechercheSup();
            return $donnee;
        }
    }
?>