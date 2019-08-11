<?php

use App\Controllers\SignUpController;
use Doctrine\ORM\EntityManager;
use Slim\Views\Twig;

$container = $app->getContainer();

$container[SignUpController::class] = function ($c) {
    return new SignUpController(
        $c->get(EntityManager::class),
        $c->get(Twig::class)
    );
};
