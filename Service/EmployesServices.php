<?php

    include_once 'DAO/EmployesMysqliDao.php';

    class EmployesServices extends EmployesMysqliDao{
        static function addEmployes($employes){
            parent::addEmployes($employes);
        }

        static function modifEmployes($employes){
            parent::modifEmployes($employes);
        }

        static function supprimeEmploye(int $noemp){
            parent::supprimeEmploye($noemp);
        }
    }
?>