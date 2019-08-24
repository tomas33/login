<?php

namespace App\Repositories;


use  Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findUserByUsernameOrEmail(string $username, string $email)
    {
       $query = $this
            ->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery();
           $user = $query->getSingleResult();
            var_dump($user);
        return $user;

    }
}
