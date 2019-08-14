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
        $password = password_hash
        ($request->getParam('password'),
        PASSWORD_DEFAULT);
        
        $user = $this->em->getRepository(User::class)->username();

        if ($username !=$user["username"])
        {
          echo 'login bien';
        }
                
        
        
        return var_dump($user);//$this->twig->render($response, 'helloworld.twig');
    }
}
