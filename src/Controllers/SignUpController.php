<?php

namespace App\Controllers;


use Slim\Container;
use App\Domain\User;

class SignUpController{

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function __invoke(string $username ,string $email, string $password): User {
        $user = new User($username,$email, $password);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

}
