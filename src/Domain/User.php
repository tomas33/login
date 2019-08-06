<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;


class User {

    private $id;
    private $username;
    private $email;
    private $password;
    public function __construct (string $username ,string $email, string $password)
    {
        $this->username = $username;
        $this->email    = $email;
        $this->password = $password;
    }
}
