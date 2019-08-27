<?php

namespace Tests\Domain;

use App\Domain\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testFailure()
    {
        $this->assertClassHasAttribute('id', User::class);
        $this->assertClassHasAttribute('username', User::class);
        $this->assertClassHasAttribute('email', User::class);
        $this->assertClassHasAttribute('password', User::class);
        
    }
}