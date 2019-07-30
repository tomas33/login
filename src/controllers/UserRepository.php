<?php

$container[UserRepository::class] = function ($container) {
    return new UserRepository($container[EntityManager::class]);
};

namespace App\Controllers;

class UserRepository {

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function signUp(string $username ,string $email, string $password): User {
        $user = new User($username,$email, $password);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

}
