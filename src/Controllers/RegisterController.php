<?php

namespace App\Controllers;

class RegisterController {

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
