<?php

use App\Controllers\SignUpController;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[SignUpController::class] = function ($c) {
   $SignUpController = new SignUpController(
        $c->get(EntityManager::class),
        $c->get("view")
    );
    return SignUpController($SignUpController);
};
