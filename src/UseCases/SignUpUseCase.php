<?php

namespace App\Controllers\UseCases;

use App\Domain\User;
use Doctrine\ORM\EntityManager;

class SignUpUseCase
{
    private $em;
    private $username;
    private $email;
    private $password;
        public function __construct (EntityManager $em ,$username, $email, $password)
    {
        $this->em       = $em;
        $this->username = $username;
        $this->email    = $email;
        $this->password = $password;
        $user = new User($username, $email, $password);

        $this->em->persist($user);
        $this->em->flush();

    
    }

}