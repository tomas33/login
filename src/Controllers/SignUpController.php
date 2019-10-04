<?php

namespace App\Controllers;

use Slim\Views\Twig;
use App\UseCases\SignUpUseCase;
use App\Exceptions\UserAlreadyExistException;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Domain\Session;

class SignUpController
{
    private $useCase;
    private $twig;

    public function __construct(SignUpUseCase $useCase, Twig $twig)
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
        $username = $request->getParam('username');
        $email    = $request->getParam('email');
        $crypt    = $request->getParam('password');
        $password = password_hash($crypt, PASSWORD_DEFAULT);

        try {
            $this->session = new Session();
            $this->session->init();
            $this->session->get('id');
            if ($request->isGet()) {
                if ($this->session->getStatus() === 1 || empty($this->session->get('id'))) {
                    return $this->twig->render(
                        $response,
                        'signup.html.twig'
                    );
                } else {
                    return $response->withRedirect('/', 301);
                }
            }
            $this->useCase->__invoke($username, $email, $password);
        } catch (UserAlreadyExistException | \InvalidArgumentException $message) {
            return $this->twig->render(
                $response,
                'signup.html.twig',
                [
                    'message' => $message->getMessage(),
              ]
            );
        }
        //return $this->twig->render($response, 'registro-ok.html.twig');
        return $response->withRedirect('/', 301);
    }
}
