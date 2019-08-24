<?php

namespace App\Repositories;


use  Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
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
