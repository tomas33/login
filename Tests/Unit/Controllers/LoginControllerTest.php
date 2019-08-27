<?php

namespace Tests\Controllers;

use App\Controllers\LoginController;
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{
    public function testFailure()
    {
        $this->assertClassHasAttribute('useCase', LoginController::class);
        $this->assertClassHasAttribute('twig', LoginController::class);
        $this->assertArrayHasKey('message', ['message' => '$message->getMessage()']);
    }
   
}
