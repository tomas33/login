<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class HelloWorldController {

    private $view;

    public function __construct(Twig $view) {

        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response, $args = []) {
        $this->view->render($response, 'helloworld.twig');
        return $response;
    }

}
