<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 18:01
 */

namespace App\Service;


class SesProvider implements MailerProvider
{
    public function send($email,$message){
        return true;
    }
}