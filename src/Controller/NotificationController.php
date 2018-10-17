<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 18:27
 */

namespace App\Controller;

use App\Service\SmtpProvider;
use App\Entity\User;
use App\Service\NotificationService;
use App\Service\UtilService;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\Response;

class NotificationController
{
    private $notificationService;

    public function sendNotification(SmtpProvider $smtpProvider,UtilService $utilService,UserService $userService,$id){
        $notificationService=new NotificationService($smtpProvider);
        $message=$utilService->randomWords();
        $user=$userService->findUserById($id);
        $notify=$notificationService->notify($user,$message);
        $arrayJson=array('id'=>$id,'email'=>$user->email,'message'=>$message,'result'=>$notify);
        $jsonFinal=json_encode($arrayJson);
        return new Response(
            $jsonFinal
        );
    }
}