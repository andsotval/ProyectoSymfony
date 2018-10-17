<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 18:00
 */

namespace App\Entity;


class SmtpProvider implements MailerProvider
{
    public function send($email,$message){
        return true;
    }
}