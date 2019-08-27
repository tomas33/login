<?php

namespace Tests\Controllers; 

use App\Controllers\SignUpController;
use PHPUnit\Framework\TestCase;

class SignUpControllerTest extends TestCase
{
    public function testFailure()
    {
        $this->assertClassHasAttribute('useCase',SignUpController::class);
        $this->assertClassHasAttribute('twig',SignUpController::class);
        $this->assertArrayHasKey('message', ['message' => '$message->getMessage()']);
    }
}
