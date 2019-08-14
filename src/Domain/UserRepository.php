<?php
namespace App\Domain;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\User;
class UserRepository extends EntityRepository
{
    public function username()
        {
        return $this->em->createQuery('SELECT username.username,username.password FROM App\Domain\User username WHERE username.username = :name')
        ->setParameter('name', $username)                 
        ->getResult();
    }
}