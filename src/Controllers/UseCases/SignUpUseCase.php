<?php

namespace App\Controllers\UseCases;

use App\Domain\User;
use Slim\Http\Request;
use Slim\Http\Response;
use App\controllers\SignUpController;
class SignUpUseCase
{
        public function __invoke(Request $request, Response $response, ?array $args = []): Response
    {
        $username = $request->getParam('username');
        $email = $request->getParam('email');
        $crypt  = $request->getParam('password');
        $password = password_hash($crypt, PASSWORD_DEFAULT);

        $user = new User($username, $email, $password);

        $this->em->persist($user);
        $this->em->flush();

        return $this->twig->render($response, 'registro.twig');
    }

}