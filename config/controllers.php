<?php

use App\Controllers\HelloWorldController;
use App\Controllers\SignUpController;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[HelloWorldController::class] = function ($c) {
    return new HelloWorldController($c->get("view"));
};

$container[SignUpController::class] = function ($c) {
   $SignUpController = new SignUpController(
        $c->get(EntityManager::class),
        $c->get("view")
    );
    return SignUpController($SignUpController);
};
