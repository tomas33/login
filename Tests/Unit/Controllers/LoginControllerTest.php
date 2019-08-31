<?php

namespace Tests\Controllers;


use App\Controllers\LoginController;
use App\UseCases\LoginUseCase;
use Doctrine\DBAL\Schema\View;
use Exception;
use PHPUnit\Framework\TestCase;
use Slim\Views\Twig;

class LoginControllerTest extends TestCase
{
    
    public function testFailure()
    {
        $loginusecase = $this->createMock(LoginUseCase::class)
            ->method('__invoke')
            ->willThrowException(new Exception("usuario requerido"));
            

        $loginusecase
            ->with(
                $this->anything()
            );
        $twigMock = $this->getMockBuilder(Twig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $twigMock->method('render')
            ->willReturn('');
    
      
        $login = new LoginController('$','llslsls');

    }
    
}
