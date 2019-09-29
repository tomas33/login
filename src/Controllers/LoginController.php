<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;
use Slim\Views\Twig;
use App\UseCases\LoginUseCase;
use App\Exceptions\UserAlreadyExistException;

class LoginController
{
    private $useCase;
    private $twig;

    public function __construct(LoginUseCase $useCase, Twig $twig)
    {
        $this->useCase   = $useCase;
        $this->twig = $twig;
    }

    public function __invoke(
        RequestInterface $request,
        ResponseInterface $response,
        ?array $args = []
    ): ResponseInterface {
        $username = $request->getParam('username');
        $password = $request->getParam('password');
        $email    = $request->getParam("email");
        try {
            $this->useCase->__invoke($username, $email, $password);
        } catch (UserAlreadyExistException | \InvalidArgumentException $e) {
            return $this->twig->render(
                $response,
                'login-ko.html.twig',
                [
                    'message' => $e->getMessage(),
                ]
            );
        }
        return $this->twig->render($response, 'login-ok.html.twig');
    }
}
