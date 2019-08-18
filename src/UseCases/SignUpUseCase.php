<?php

namespace App\Controllers\UseCases;

use App\Domain\User;
use Doctrine\ORM\EntityManager;

class SignUpUseCase
{
        public function __invoke(EntityManager $em ,$username, $email, $password)
    {
    
        $user = new User($username, $email, $password);

        $this->em->persist($user);
        $this->em->flush();

    
    }

}