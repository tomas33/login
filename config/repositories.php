<?php

use App\Repositories\UserRepository;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[UserRepository::class] = function (ContainerInterface $c) {
    return $c->get(EntityManager::class)->getRepository(User::class);
};
