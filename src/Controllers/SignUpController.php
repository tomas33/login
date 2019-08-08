<?php

namespace App\Controllers;

use App\Domain\User;
use Doctrine\ORM\EntityManager;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

class SignUpController
{

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function __invoke(Request $request, Response $response, ?array $args = []): Response
    {
        $username = $request->getParam('username');
        $email = $request->getParam('email');
        $password = $request->getParam('password');

        $user = new User($username, $email, $password);

        $this->em->persist($user);
        $this->em->flush();

        return $response->withStatus(StatusCode::HTTP_NO_CONTENT);
    }
}
