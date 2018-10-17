<?php
/**
 * Created by PhpStorm.
 * User: Andres
 * Date: 17/10/2018
 * Time: 21:11
 */

namespace App\Service;


use App\Entity\User;

class UserService
{
    private $arrayUser;

    public function __construct()
    {
        $this->arrayUser=array(new User(1,"John","john@gmail.com"),
            new User(3,"James","james@gmail.com"),
            new User(4,"Juan","juan@gmail.com"),
            new User(2,"Jose","jose@gmail.com"),
            new User(5,"Antonio","antonio@gmail.com"),
            );
    }
    public function findUserById($id){
        $user = null;
        foreach($this->arrayUser as $item) {
            if ($id == $item->id) {
                $user = $item;
                break;
            }
        }
        return $user;
    }
}