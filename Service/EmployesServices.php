<?php

    include_once 'DAO/EmployesMysqliDao.php';

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
    }
?>