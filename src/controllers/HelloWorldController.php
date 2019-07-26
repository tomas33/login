<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class HelloWorldController {

    protected $ci;
    protected $views;
    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
        $this->views;
    }

    public function __invoke(Request $request, Response $response, $args = []) {
        return $response->write("Hello World");
    }

}
