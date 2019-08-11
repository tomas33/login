<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class LoginController
{
    private $wig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(Request $request, Response $response, $args = [])
    {
        return $this->twig->render($response, 'helloworld.twig');
    }
}
