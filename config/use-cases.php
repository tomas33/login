<?php

use App\UseCases\SignUpUseCase;
use App\Repositories\UserRepository;

$container = $app->getContainer();

$container[SignUpUseCase::class] = function ($c) {
    return new SignUpUseCase(
         $c->get(UserRepository::class)
        );
};