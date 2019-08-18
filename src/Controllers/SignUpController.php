<?php

namespace App\Controllers;

use App\Domain\User;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use App\UseCases\signUpUseCase;
class SignUpController
{

    /**
     * @var EntityManager
     */
    private $em;
    private $twig;
    
    public function __construct(SignUpUseCase $useCase,Twig $twig)
    {
        $this->em = $em;
        $this->twig = $twig;
    }

    public function __invoke(Request $request, Response $response, ?array $args = []): Response
    {
        $username = $request->getParam('username');
        $email = $request->getParam('email');
        $crypt  = $request->getParam('password');
        $password = password_hash($crypt, PASSWORD_DEFAULT);
        
         return $this->twig->render($response, 'login-correcto.html.twig', array('tomas' => 'tomas'));
    }
}
