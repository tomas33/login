<?php

namespace App\Controllers;

use App\UseCases\LoginUseCase;
use Slim\Views\Twig;
use App\Exceptions\UserAlreadyExistException;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Domain\Session;

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
            $this->session = new Session();
            $this->session->init();
            $this->session->get('id');
            if ($request->isGet()) {
                if ($this->session->getStatus() === 1 || empty($this->session->get('id'))) {
                    return $response->withRedirect('/', 301);
                }else {
                    return $this->twig->render(
                        $response,
                        'home.html.twig',
                        [
                            'session' => $_SESSION['id'],
                        ]
                    );
                }
               
            }
            
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
        /*return $this->twig->render(
            $response,
            'login.html.twig'
        );*/
        //return $response->withRedirect('/', 301);
    }
}
