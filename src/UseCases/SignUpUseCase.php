<?php

namespace App\UseCases;

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
    }
        public function __invoke($username, $email, $password)
    {
        $user = new User($username, $email, $password);
    

         $userverify = $this->em->getRepository(User::class)->findOneBy([
            'username' => $username,
            'email'    => $email
]);
        if (!is_null($userverify->email))
        {
            return $this->twig->render($response, 'usuario-regiatrado-db.html.twig');
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return $this->twig->render($response, 'email-no-valido.html.twig');

        }
    }
}