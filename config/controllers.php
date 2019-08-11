<?php

use App\Controllers\SignUpController;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

$container[SignUpController::class] = function ($c) {
    return new SignUpController(
        $c->get(EntityManager::class),
        $c->get("view")
    );
};
