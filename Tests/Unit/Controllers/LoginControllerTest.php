<?php

namespace Tests\Controllers;

use App\Controllers\LoginController;
use PHPUnit\Framework\TestCase;
use Slim\Views\Twig;


class LoginControllerTest extends TestCase
{
    
    public function testFailure()
    {
        
        $this->assertClassHasAttribute('useCase', LoginController::class);
        $this->assertClassHasAttribute('twig', LoginController::class);
        $this->assertArrayHasKey('message', ['message' => '$message->getMessage()']);

        $view = $this->getMockBuilder(Twig::class)
            ->setMethods(['render'])
            ->disableOriginalConstructor()
            ->getMock();

        $response = new Response();
        $response->write('Rendered text on page');
        $message[]='';
        $this->view->expects($this->once())
            ->method('render')
            ->with($response, 'login-ko.html.twig', ['message' => $message])
            ->willReturn($response);
    }
   
}
