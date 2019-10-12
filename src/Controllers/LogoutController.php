<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use App\Domain\Session;

class LogoutController
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
    ) {

        $this->session = new Session();
        if ($this->session->getStatus() === 1 || empty($this->session->get('id'))) {
            $this->session->close();
            return $response->withRedirect('/login', 301);
        }
        
        
        return $response->withRedirect('/login', 301);
    }
}