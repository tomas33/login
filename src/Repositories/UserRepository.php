<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function findUserByUsernameOrEmail(string $username, string $email)
    {
        
        return $this
            ->createQueryBuilder('u')
            ->andWhere('u.username = :username')
            ->orWhere('u.email = :email')
            ->setParameters([
                'username' => $username,
                'email' => $email
            ])
            ->getQuery()
            ->getOneOrNullResult();
    }
}
