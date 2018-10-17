<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 17:41
 */

namespace App\Service;


class NotificationService
{
    private $provider;

    public function __construct(MailProvider $provider)
    {
        $this->provider=$provider;
    }
}