<?php

namespace Tests\Controllers;


use App\Controllers\LoginController;
use App\UseCases\LoginUseCase;
use PHPUnit\Framework\TestCase;
use Slim\Views\Twig;

class LoginControllerTest extends TestCase
{
    
    public function testFailure()
    {
        $this->assertClassHasAttribute('useCase', LoginController::class);
        $this->assertClassHasAttribute('twig', LoginController::class);
        $this->assertArrayHasKey('message', ['message' => '$message->getMessage()']);
    }

    public function testStub()
    {
        $mock = $this->getMockBuilder(LoginController::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $mock->method('__invoke')
            ->willReturn('foo');

        $controller = new LoginController(LoginUseCase,Twig);
        $this->assertTrue($controller->twig);
    }
    
}
