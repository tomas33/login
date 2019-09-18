<?php

namespace App\UseCases;

use App\Exceptions\UserAlreadyExistException;
use App\Repositories\UserRepository;

class LoginUseCase
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository   = $repository;
    }

    public function __invoke(string $username, string $email, string $password)
    {
        $user = $this->repository->findOneBy([
            'username' => $username
        ]);

        if (is_null($user)) {
            throw new UserAlreadyExistException('usuario requerido');
        }
        if (!password_verify($password, $user->password())) {
            throw new \InvalidArgumentException('contraseña o usuario incorrecto');
        }
    }
}
