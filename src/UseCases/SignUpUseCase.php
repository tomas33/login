<?php

namespace App\UseCases;

use App\Domain\User;
use Doctrine\ORM\EntityManager;

class SignUpUseCase
{
    private $em;

        public function __construct (EntityManager $em)
    {
        $this->em       = $em;
        
    }
        public function __invoke($username, $email, $password)
    {
         $user = $this->em->getRepository(User::class)->findOneBy([
            'username' => $username,
            'email'    => $email
]);
        if (!is_null($user->email))
        {
            return $this->throw = new \Exception();
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return $this->throw = new \Exception();

        }
         $user = new User($username, $email, $password);

            $this->em->persist($user);
            $this->em->flush();
    }
}