<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use App\UseCases\SignUpUseCase;

class SignUpController
{

   
    private $useCase;
    private $twig;
    
    public function __construct(SignUpUseCase $useCase,Twig $twig)
    {
        $this->useCase = $useCase;
        $this->twig = $twig;
    }

    public function __invoke(Request $request, Response $response, ?array $args = []): Response
    {
        $username = $request->getParam('username');
        $email    = $request->getParam('email');
        $crypt    = $request->getParam('password');
        $password = password_hash($crypt, PASSWORD_DEFAULT);
        
        $this->useCase->__invoke($username,$email,$password);
        
         return $this->twig->render($response, 'login-correcto.html.twig', array('tomas' => 'tomas'));
    }
}
