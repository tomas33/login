<?php

namespace App\Controllers;


use App\Domain\User;
use Doctrine\ORM\Tools\Setup;

class SignUpController{

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct($em) {
        $this->em = $em;
    }

    public function __invoke(string $username ,string $email, string $password): User {
       
        $user = new User($username,$email, $password);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

}
