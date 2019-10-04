<?php

namespace App\UseCases;

use App\Domain\Session;
use App\Exceptions\UserAlreadyExistException;
use App\Repositories\UserRepository;

class LoginUseCase
{
    private $repository;
    private $session;
    public function __construct(UserRepository $repository)
    {
        $this->repository   = $repository;
        $this->session = new Session();
    }

    public function __invoke(string $email, string $password)
    {
        $user = $this->repository->findOneBy([
            'email' => $email
        ]);

        if (is_null($user)) {
            throw new UserAlreadyExistException('usuario requerido');
        }
        if (!password_verify($password, $user->password())) {
            throw new \InvalidArgumentException('contraseña o usuario incorrecto');
        }
        $this->session->init();
        $this->session->add('id', $user->id());
    
    }
}
