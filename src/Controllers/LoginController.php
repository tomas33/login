<?php

namespace App\Controllers;

use App\Domain\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
class LoginController
{
    /**
     * @var EntityManager
     */
    private $em;
    private $twig;

    public function __construct(EntityManager $em,Twig $twig)
    {
        $this->em   = $em;
        $this->twig = $twig;
        
    }

    public function __invoke(Request $request, Response $response, $args = [])
    {
        
        $username = $request->getParam('username');
        $password = $request->getParam('password');
        
        $user = crypt($this->em->getRepository(User::class)->findOneBy([
    'password' => $password
]));

        if (password_verify('tomas',$user)== true)
        {
          return $this->twig->render($response, 'login-erroneo.html.twig');
        }
                
        
        
        return $this->twig->render($response, 'login-correcto.html.twig');
    }
}
