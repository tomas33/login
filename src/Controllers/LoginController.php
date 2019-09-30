<?php

namespace App\Controllers;



use App\UseCases\LoginUseCase;
use App\Exceptions\UserAlreadyExistException;
use Slim\Http\Request;
use Slim\Http\Response;

class LoginController
{
    private $useCase;
    

    public function __construct(LoginUseCase $useCase)
    {
        $this->useCase   = $useCase;
       
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
            return $e->getMessage();
                
        }
        return $response->withRedirect('/', 301);
    }
}
