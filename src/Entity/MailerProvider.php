<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 17:56
 */

namespace App\Entity;


interface MailerProvider
{
    public function send($email,$message);
}