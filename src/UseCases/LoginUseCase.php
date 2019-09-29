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

    public function __invoke(string $email, string $password)
    {
        $email = $this->repository->findOneBy([
            'email' => $email
        ]);

        if (is_null($email)) {
            throw new UserAlreadyExistException('usuario requerido');
        }
        if (!password_verify($password, $email->password())) {
            throw new \InvalidArgumentException('contraseña o usuario incorrecto');
        }
    }
}
