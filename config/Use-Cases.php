<?php

use App\UsesCases\SignUpUseCase;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[SignUpUseCase::class] = function ($c) {
    return new SignUpUseCase(
         $c->get(EntityManager::class)
        );
};