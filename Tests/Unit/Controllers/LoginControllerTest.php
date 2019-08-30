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
        $observer = $this->getMockBuilder(LoginController::class)
            ->setMethods(['__invoke'])
            ->disableOriginalConstructor()
            ->getMock();
        $observer->expects($this->once())
            ->method('__invoke')
            ->with($this->anything()
            );
        $subject = new LoginController('LoginController','email');
        $subject->attach($observer);

    }
    
}
