<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface;
use App\UseCases\SignUpUseCase;

class SignUpController
{

   
    private $useCase;
    private $responseInterface;
    
    public function __construct(SignUpUseCase $useCase,ResponseInterface $responseInterface)
    {
        $this->useCase = $useCase;
        $this->responseInterface = $responseInterface;
    }

    public function __invoke(Request $request, Response $response, ?array $args = []): Response
    {
        $username = $request->getParam('username');
        $email    = $request->getParam('email');
        $crypt    = $request->getParam('password');
        $password = password_hash($crypt, PASSWORD_DEFAULT);
        
        try {
            $this->useCase->__invoke($username, $email,$password);
        } catch (\Exception $e) {
            return $this->twig->render($response, 'login-correcto.html.twig',array(
                    'name' => $useCase
              ));   
        }
        
        
         return $this->twig->render($response, 'login-correcto.html.twig');
    }
}
