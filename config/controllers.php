<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Slim\App;

$container = $app->getContainer();
$container[\app\Controllers\HelloWorldController::class] = function ($c) {
    return new app\Controllers\HelloWorldController;
};