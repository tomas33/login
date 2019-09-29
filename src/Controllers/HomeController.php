<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;


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
       
        
        $this->twig->render($response, 'login-ok.html.twig');
        if (!is_null($password)or (!is_null($email)))
        {
                return;
        }
         
    }
}