<?php

namespace App\Domain;


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
    public function id()
{
    return $this->id;
}

public function username(): string
{
    return $this->username;
}

public function email(): string
{
    return $this->email;
}

public function password(): string
{
    return $this->password;
}

}
