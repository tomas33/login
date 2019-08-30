<?php

namespace Tests\Controllers;


use App\Controllers\LoginController;
use App\UseCases\LoginUseCase;
use Doctrine\DBAL\Schema\View;
use PHPUnit\Framework\TestCase;
use Slim\Views\Twig;

class LoginControllerTest extends TestCase
{
    
    public function testFailure()
    {
        $loginusecase = $this->createMock(LoginUseCase::class)
            ->method('__invoke')
            ->will($this->throwException(new UserAlreadyExistException('usuario requerido')));
            

        $loginusecase->expects($this->once())
            ->method('render')
            ->with(
                $this->anything()
            );
        $stub = $this->createMock(Twig::class);
        
        $stub->method('__invoke')
            ->willReturn('tomas');
       
        $this->assertSame('tomas', $stub->method('__invoke'));
      
        

    }
    
}
