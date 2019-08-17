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
    

         $userverify = $this->em->getRepository(User::class)->findOneBy([
    'username' => $username
]);
        if (!is_null($userverify))
        {
            
          return $this->twig->render($response, 'usuario-regiatrado-db.html.twig');
        }
        if (filter_var($email,FILTER_VALIDATE_EMAIL)){
            

            return $this->twig->render($response, 'email-no-valido.html.twig');

        }
        
            $this->em->persist($user);
            $this->em->flush(); 
        return $this->twig->render($response, 'login-erroneo.html.twig');
    }
}
