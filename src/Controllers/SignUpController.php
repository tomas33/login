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
    
    public function __construct(signUpUseCase $em,Twig $twig)
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
    

         $userverify = $this->em->getRepository(User::class)->findOneBy([
    'username' => $username,
    'email'    => $email
]);
        if (!is_null($userverify->email))
        {
            return $this->twig->render($response, 'usuario-regiatrado-db.html.twig');
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return $this->twig->render($response, 'email-no-valido.html.twig');

        }
        
          
        return $this->twig->render($response, 'login-correcto.html.twig', array('tomas' => 'tomas'));
    }
}
