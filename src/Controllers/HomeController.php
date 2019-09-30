<?php

namespace App\Controllers;

use App\Domain\User;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class HomeController
{
    
    private $twig;


    public function __construct(Twig $twig)
    {
       
        $this->twig = $twig;
    }

    public function __invoke(
        Request $request,
        Response $response,
        ?array $args = []
    ) 
    {
        session_start();

           
        $this->twig->render($response, 'login-ok.html.twig');
        
         
    }
}