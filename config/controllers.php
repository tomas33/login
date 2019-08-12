<?php

use App\Controllers\LoginController;
use App\Controllers\SignUpController;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[LoginController::class] = function ($c) {
    return new LoginController($c->get(Twing::class));
};

$container[SignUpController::class] = function ($c) {
    return new SignUpController(
        $c->get(EntityManager::class),
        $c->get(Twing::class)
    );
};
