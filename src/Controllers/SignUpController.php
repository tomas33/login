<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;
use App\UseCases\SignUpUseCase;
use App\Exceptions\UserAlreadyExistException;
class SignUpController
{

   
    private $useCase;
    private $twig;
    
    public function __construct(SignUpUseCase $useCase,Twig $twig)
    {
        $this->useCase = $useCase;
        $this->twig = $twig;
    }

     public function __invoke(RequestInterface $request, ResponseInterface $response, ?array $args = []): ResponseInterface
    {
        $username = $request->getParam('username');
        $email    = $request->getParam('email');
        $crypt    = $request->getParam('password');
        $password = password_hash($crypt, PASSWORD_DEFAULT);
        
        try {
            $this->useCase->__invoke($username, $email,$password);
        } catch (\Exception $e) {
            return $this->twig->render($response, 'registro-ko.html.twig'
              );   
        }
        
        
         return $this->twig->render($response, 'registro-ok.html.twig');
    }
}
