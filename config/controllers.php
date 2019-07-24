<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Slim\App;

$container['UserController'] = function ($c) {
        return new app\controllers\PasswordController($container);
    };
