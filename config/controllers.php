<?php

use App\Controllers\LoginController;
use App\Controllers\SignUpController;
use Doctrine\ORM\EntityManager;
use Slim\Views\Twig;

$container = $app->getContainer();

$container[LoginController::class] = function ($c) {
    return new LoginController(
        $c->get(EntityManager::class),
        $c->get(Twig::class));
};

$container[SignUpController::class] = function ($c) {
    return new SignUpController(
        $c->get(EntityManager::class),
        $c->get(Twig::class)
    );
};
