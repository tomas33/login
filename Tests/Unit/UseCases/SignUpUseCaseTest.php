<?php

use App\Domain\User;
use App\Exceptions\UserAlreadyExistException;
use App\Repositories\UserRepository;
use App\UseCases\SignUpUseCase;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;


class SingUpUseCaseTest extends TestCase
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
        return new SignUpUseCase(
            $this->userRepository
        );
    }


    public function testUserExist()
    {
        $this->userRepository
            ->expects($this->once())
            ->method('findUserByUsernameOrEmail')
            ->with(
            
                'username'
            )
            ->willReturn('username');

        $this->expectException(UserAlreadyExistException::class);

        $this->createSut()->__invoke('username', 'email', 'password');
    }
    public function testEmailIsInvalid()
    {
        $this->userRepository
            ->expects($this->once())
            ->method('findUserByUsernameOrEmail')
            ->with(
                'username',
                'email'
            );

        $this->expectException(\InvalidArgumentException::class);

        $this->createSut()->__invoke('username', 'email', 'password');
    }
   
    public function testSuccess()
    {
        $this->userRepository
            ->expects($this->once())
            ->method('findUserByUsernameOrEmail')
            ->with(
                'username',
            'email@test.com'
            );
       
        $this->createSut()->__invoke('username', 'email@test.com', 'password');
    }
}
