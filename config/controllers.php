<?php

use App\Controllers\HelloWorldController;
use App\Controllers\SingUpContrller;

$container = $app->getContainer();

$container[HelloWorldController::class] = function ($c) {
    return new HelloWorldController($c->get("view"));
};
$container[SingUpContrller::class] = function ($c) {
    return new SingUpContrller($c->get("EntityManager"));
};