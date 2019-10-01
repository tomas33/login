<?php

namespace App\Controllers;

use App\UseCases\LoginUseCase;
use Slim\Views\Twig;
use App\Exceptions\UserAlreadyExistException;
use Slim\Http\Request;
use Slim\Http\Response;

class LoginController
{
    private $useCase;
    private $twig;

    public function __construct(LoginUseCase $useCase, Twig $twig)
    {
        $this->useCase = $useCase;
        $this->twig = $twig;
    }

    public function __invoke(
        Request $request,
        Response $response,
        ?array $args = []
    )
     {
       
        $password = $request->getParam('password');
        $email    = $request->getParam("email");
        try {
            $this->useCase->__invoke($email,$password);
          
            
        } catch (UserAlreadyExistException | \InvalidArgumentException $e)
         {
            return $this->twig->render(
                $response,
                'login.html.twig',
                [
                    'message' => $e->getMessage(),
                ]
            );
                
        }

        return $response->withRedirect('/home', 301);
    }
}
