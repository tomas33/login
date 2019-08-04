<?php

namespace App\Controllers;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use Slim\Container;
use App\Domain\Usuarios;

class SignUpController{

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function __invoke(string $username ,string $email, string $password): User {
        $user = new User($username,$email, $password);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

}
