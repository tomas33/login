<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Slim\Container;

require __DIR__ . '/./bootstrap.php';

$container = $app->getContainer();

return ConsoleRunner::createHelperSet($container[EntityManager::class]);
