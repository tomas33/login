<?php

use App\Exceptions\UserAlreadyExistException;
use App\Repositories\UserRepository;
use App\UseCases\LoginUseCase;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\ObjectEnumerator\InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;

class LoginUseCaseTest extends TestCase
{
    /**
     * @var MockObject|repository
     */
    private $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->createMock(UserRepository::class);
        
    }
    private function createSut()
    {
        return new LoginUseCase(
            $this->repository
        );
    }
     public function useCaseExceptionsProvider(): array
    {
        return [
            [UserAlreadyExistException::class],
            [InvalidArgumentException::class]
        ];
    }

    /**
     * @dataProvider useCaseExceptionsProvider
     */
    /**
     * @test
     */
    public function ExcepcionTest()
    {
        
        $this->repository
            ->expects($this->once())
            ->method('findOneBy')
            ->with(
                ['username'=>'tomas'],
                )
            ->willReturnSelf();
        $this->createSut()->__invoke('tomas','email', '1231456');
    }
}

