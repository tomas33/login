<?php

namespace App\Controllers;


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
        if ($_SESSION == null) {
            $this->twig->render(
                $response,
                'home.html.twig',
                [
                    'session' => $_SESSION,
                ]
            ); 
        }

        \var_dump($_SESSION);
        $this->twig->render($response,
            'home.html.twig',
            [
                'session' => $_SESSION,
            ]);
        
    }
}