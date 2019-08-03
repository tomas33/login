<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="Usuarios")
 * @ORM\Entity
 */
class Usuarios {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(name="email", type="integer", length=3)
     */
    private $email;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

}
