<?php

use App\Repositories\UserRepository;
use Doctrine\ORM\EntityManager;
use App\Domain\User;

$container = $app->getContainer();

$container[UserRepository::class] = function (ContainerInterface $c) {
    return $c->get(EntityManager::class)
    ->getRepository(User::class);
};
