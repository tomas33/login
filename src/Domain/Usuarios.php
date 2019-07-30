<?php

//Una vez creada la entidad ejecutamos la consola de Doctrine para que cree esta tabla en la base de datos
//php vendor/bin/doctrine orm:schema-tool:create

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
     * @ORM\Column(name="Username", type="string", length=255)
     */
    private $Username;

    /**
     * @ORM\Column(name="Email", type="integer", length=3)
     */
    private $Email;

    /**
     * @ORM\Column(name="Password", type="string", length=255)
     */
    private $Password;

    public function __get($property) {

        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {

        if (property_exists($this, $property)) {

            $this->$property = $value;
        }
    }

}
