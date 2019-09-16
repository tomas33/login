<?php

use App\Domain\User;
use App\Exceptions\UserAlreadyExistException;
use App\Repositories\UserRepository;
use App\UseCases\LoginUseCase;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;


class LoginUseCaseTest extends TestCase
{
    /**
     * @var MockObject|UserRepository
     */
    private $userRepository;
    /**
     * @var MockObject|User
     */
    private $user;
    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = $this->createMock(UserRepository::class);
        $this->user       = $this->createMock(User::class);
         
    }
    private function createSut()
    {
        return new LoginUseCase(
            $this->userRepository
        );
    }
     
  
    public function testUserNotFound()
    {
           $this->userRepository
            ->expects($this->once())
            ->method('findOneBy')
            ->with(
                ['username'=>'username']
                )
            ;

        $this->expectException(UserAlreadyExistException::class);
        
        $this->createSut()->__invoke('username','email', 'password');
    
    }
    public function testPasswordNotMatch()
    {   
        $this->userRepository
            ->expects($this->once())
            ->method('findOneBy')
            ->with(
                ['username' => 'username']
            )
            ->willReturn($this->user);

        $this->user
            ->expects($this->once())
            ->method('password')
            ;
       
        $this->expectException(\InvalidArgumentException::class);
        
        $this->createSut()->__invoke('username','email','password');
    }
    public function testLoginSuccess()
    { 
        $this->userRepository
            ->expects($this->once())
            ->method('findOneBy')
            ->with(
                ['username' => 'username']
            )
            ->willReturn($this->user);

        $this->user
            ->expects($this->once())
            ->method('password')
            ->willReturn(password_hash('password', PASSWORD_DEFAULT));       
        $this->createSut()->__invoke('username', 'email', 'password');
    }
}

