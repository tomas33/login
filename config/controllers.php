<?php

use App\Controllers\LoginController;
use App\Controllers\SignUpController;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[LoginController::class] = function ($c) {
    return new HelloWorldController($c->get("view"));
};

$container[SignUpController::class] = function ($c) {
    return new SignUpController(
        $c->get(EntityManager::class),
        $c->get("view")
    );
};
