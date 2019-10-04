<?php

namespace App\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use App\Domain\Session;

class HomeController
{
    
    private $twig;
    private $session;

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
        $this->session = new Session();
        $this->session->init();
        
        if ($this->session->getStatus() === 1 || empty($this->session->get('id')))
        {
            return $response->withRedirect('/login', 301);
    }
    else {
        return $this->twig->render(
                $response,
                'home.html.twig',
                [
                    'session' => $_SESSION['id'],
                ]
            );
    }
       
        
    }
}