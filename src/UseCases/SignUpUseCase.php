<?php

namespace App\UseCases;

use App\Domain\User;
use App\Exceptions\UserAlreadyExistException;
use App\Repositories\UserRepository;

class SignUpUseCase
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(string $username, string $email, string $password)
    {
        $user = $this->repository->findUserByUsernameOrEmail(
            $username,
            $email
        );


        if (!is_null($user)) {
            throw new UserAlreadyExistException('usuario registrado');
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('email no valido');
        }



        $user = new User($username, $email, $password);

        $this->repository->persist($user);
        $this->repository->flush();
    }
}
