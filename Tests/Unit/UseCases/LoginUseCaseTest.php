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
            ->willReturn($this->expectException(UserAlreadyExistException::class));

        $this->user
        ->method('password')
        ->with(['password' => 'passord'])
        ;
        
        $this->createSut()->__invoke('username','email', 'password');
    
    }

}

