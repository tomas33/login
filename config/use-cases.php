<?php

use App\UseCases\SignUpUseCase;
use App\UseCases\LoginUseCase;
use App\Repositories\UserRepository;

$container = $app->getContainer();

$container[SignUpUseCase::class] = function ($c) {
    return new SignUpUseCase(
         $c->get(UserRepository::class)
        );
};
$container[LoginUseCase::class] = function ($c) {
    return new LoginUseCase(
        $c->get(UserRepository::class)
    );
};