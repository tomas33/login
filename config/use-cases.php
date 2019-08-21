<?php

use App\UseCases\SignUpUseCase;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[SignUpUseCase::class] = function ($c) {
    return new SignUpUseCase(
         $c->get(UserRepository::class)
        );
};