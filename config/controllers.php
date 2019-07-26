<?php

use App\Controllers\HelloWorldController;

$container = $app->getContainer();
$container[HelloWorldController::class] = function ($c) {
    return new HelloWorldController;
};