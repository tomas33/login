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
use Slim\Views\Twig as View;

class HelloWorldController {

    
    protected $views;

    public function __construct(Views $views) {
        
        return $this->View = $views;
    }

    /*public function __invoke(Request $request, Response $response, $args = []) {
        return $views->render($response, 'helloworld.twig');
    }*/

}
