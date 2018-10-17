<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 19:38
 */

namespace App\Command;


use App\Service\NotificationService;
use App\Service\SesProvider;
use App\Entity\User;
use App\Service\UserService;
use App\Service\UtilService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendNotificationCommand extends Command
{
    private $notificationService;
    private $utilService;
    private $userService;

    public function __construct(SesProvider $sesProvider,UtilService $utilService,UserService $userService)
    {
        $this->notificationService = new NotificationService($sesProvider);
        $this->utilService=$utilService;
        $this->userService=$userService;
        parent::__construct();
    }
    protected function configure()
    {
        $this->setName('sendNotificationCommand')
            ->addArgument('idUser', InputArgument::REQUIRED, 'Id User');

    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message=$this->utilService->randomWords();
        $user=$this->userService->findUserById($input->getArgument('idUser'));
        $notify=$this->notificationService->notify($user,$message);
        $arrayJson=array('id'=>$input->getArgument('idUser'),'email'=>$user->email,'message'=>$message,'result'=>$notify);
        $jsonFinal=json_encode($arrayJson);
        $output->writeln($jsonFinal);
    }
}