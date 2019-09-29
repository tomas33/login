<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    
    private $twig;


    public function __construct(Twig $twig)
    {
       
        $this->twig = $twig;
    }

    public function __invoke(
        RequestInterface  $request,
        ResponseInterface $response,
        ?array $args = []
    ) 
    {
         return $this->twig->render($response, 'login-ok.html.twig');
    }
}