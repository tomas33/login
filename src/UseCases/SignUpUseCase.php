<?php

namespace App\UseCases;

use App\Domain\User;
use App\Exceptions\UserAlreadyExistException;

class SignUpUseCase
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(string $username, string $email, string $password)
    {
        $user = $this->repository->getRepository(User::class)->findOneBy([
            'username' => $username
        ]);


        if (!is_null($user)) {
            throw new UserAlreadyExistException('usuario registrado');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('email no valido');
        }



        $user = new User($username, $email, $password);

        $this->repository->persist($user);
        $this->repository->flush();
    }
}
