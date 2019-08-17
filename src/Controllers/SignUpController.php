<?php

namespace App\Controllers;

use App\Domain\User;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;
use Slim\Views\Twig;
use App\Controller\LoginController;
class SignUpController
{

    /**
     * @var EntityManager
     */
    private $em;
    private $twig;
    
    public function __construct(EntityManager $em,Twig $twig)
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
        
        
        $user = new User($username, $email, $password);
        $args = [
            'username'   => FILTER_SANITIZE_ENCODED,
            'email'      => FILTER_VALIDATE_EMAIL, 
            'password'   =>['FILTER_CALLBACK'=> LoginController::class]
        ];

         $user = $this->em->getRepository(User::class)->findOneBy([
    'username' => $username
]);

        if (filter_var_array($user,$args)){
            $this->em->persist($user);
            $this->em->flush();

            return $this->twig->render($response, 'mensaje-registro.html.twig');

        }
        

        return $this->twig->render($response, 'login-erroneo.html.twig');
    }
}
