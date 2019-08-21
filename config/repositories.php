<?php

use App\Repositories\UserRepository;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[UserRepository::class] = function ($c) {
    return new UserRepository(
         $c->get(EntityManager::class)
        );
};