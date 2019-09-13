<?php

use App\Domain\User;
use App\Exceptions\UserAlreadyExistException;
use App\Repositories\UserRepository;
use App\UseCases\LoginUseCase;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use SebastianBergmann\Diff\InvalidArgumentException;

class LoginUseCaseTest extends TestCase
{
    /**
     * @var MockObject|UserRepository
     */
    private $UserRepository;
    /**
     * @var MockObject|user
     */
    private $user;
    protected function setUp(): void
    {
        parent::setUp();

        $this->UserRepository = $this->createMock(UserRepository::class);
        $this->user       = $this->createMock(User::class);         
    }
    private function createSut()
    {
        return new LoginUseCase(
            $this->UserRepository
        );
    }
     
  
    public function testUserNotFound()
    {
        
        $this->UserRepository
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
        
        
        $this->UserRepository
            ->expects($this->once())
            ->method('findOneBy')
            ->with(
                ['username' => 'username']
            )
            ->willReturn($this->user);
       
        $this->user
            ->expects($this->once())
            ->method('password')
            ->with(
            ['']
            )
            ->willReturn($this->toString($this->user))
        ;
       
        $this->expectException(\InvalidArgumentException::class);
        
        $this->createSut()->__invoke('username', 'email',  'password');
    }
}

