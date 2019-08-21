<?php

namespace App\UseCases;

use App\Domain\User;
use App\Exceptions\UserAlreadyExistException;
use Doctrine\ORM\EntityManager;

class SignUpUseCase
{
    
    /**
     * @var EntityManager
     */
    private $em;

        public function __construct (UserRepository $em)
    {
        $this->em = $em;
        
    }
        public function __invoke(string $username, string $email, string $password)
    {
         $user = $this->em->getRepository(User::class)->findOneBy([
            'username' => $username
]);
        
        
            if (!is_null($user))
        {
                throw new UserAlreadyExistException('usuario registrado');

        }

           if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
             throw new \InvalidArgumentException('email no valido');

        }
       
        

         $user = new User($username, $email, $password);

            $this->em->persist($user);
            $this->em->flush();
    }
}