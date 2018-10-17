<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 20:59
 */

namespace App\Service;


class UtilService
{
    public function randomWords(){
        $characters="abcdefghijklmnopqrstuvwxyz";
        $randomWords="";
        for($i=0;$i<=5;$i++){
            $randomWords.=$characters[rand(0,strlen($characters)-1)];
        }
        return $randomWords;
    }
}