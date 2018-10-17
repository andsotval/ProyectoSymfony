<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 17:41
 */

namespace App\Service;

use App\Entity\User;

class NotificationService
{
    private $provider;

    public function __construct(MailerProvider $provider)
    {
        $this->provider=$provider;
    }

    public function notify(User $user,$message){
        return $this->provider->send($user->email,$message);
    }
}