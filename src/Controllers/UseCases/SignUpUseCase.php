<?php

namespace App\Controllers\UseCases;

use App\controllers\SignUpController;
class SignUpUseCase
{
        public function __invoke($username, $email, $password)
    {
    
        $user = new User($username, $email, $password);

        $this->em->persist($user);
        $this->em->flush();

    
    }

}