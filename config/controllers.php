<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\SignUpController;
use App\UseCases\LoginUseCase;
use App\UseCases\SignUpUseCase;
use Slim\Views\Twig;

$container = $app->getContainer();

$container[LoginController::class] = function ($c) {
    return new LoginController(
        $c->get(LoginUseCase::class),
        $c->get(Twig::class)
    );
};
$container[LogoutController::class] = function ($c) {
    return new LogoutController(
        $c->get(Twig::class)
    );
};
$container[SignUpController::class] = function ($c) {
    return new SignUpController(
        $c->get(SignUpUseCase::class),
        $c->get(Twig::class)
    );
    
};

$container[HomeController::class] = function ($c) {
    return new HomeController(
        $c->get(Twig::class)
    );
};