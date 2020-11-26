<?php

function division(int $a, $b):void{
    if($a < 0 || $b < 0){
        throw new NegativeNumberException("Les nombres négatifs ne sont pas acceptés", 1000);
    }
    if($b == 0){
        throw new DivisionByZeroException("Divion par zéro non autorisée", 9999);
    }
    echo $a / $b;
}