<?php

namespace App\Controllers;

use App\Domain\Session;
use App\Domain\User;
use App\UseCases\LoginUseCase;
use App\Exceptions\UserAlreadyExistException;
use Slim\Http\Request;
use Slim\Http\Response;

class LoginController
{
    private $useCase;
    private $session;

    public function __construct(LoginUseCase $useCase)
    {
        $this->useCase = $useCase;
        $this->Session = new Session();
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
            $this->session->init();
            $this->session->add('id',$this->user->id());
            
        } catch (UserAlreadyExistException | \InvalidArgumentException $e)
         {
            return $e->getMessage();
                
        }

        return $response->withRedirect('/', 301);
    }
}
