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
     * @var MockObject|repository
     */
    private $repository;
    /**
     * @var MockObject|user
     */
    private $user;
    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->createMock(UserRepository::class);
        $this->user       = $this->createMock(User::class);         
    }
    private function createSut()
    {
        return new LoginUseCase(
            $this->repository
        );
    }
     
  
    public function testUserNotFound()
    {
        $this->repository
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
        $this->repository
            ->expects($this->exactly(1))
            ->method('findOneBy')
            ->with(
                ['username' => 'username']
            )
           
        ;
        $this->expectException (UserAlreadyExistException::class);
        $this->user->expects($this->exactly(1))
        ->method('password')
        ->with(['password' => 'password'])
        ;

        $this->user->password(['password' => 'password']);
        $this->createSut()->__invoke('username', 'email',  'password');
    }
}

