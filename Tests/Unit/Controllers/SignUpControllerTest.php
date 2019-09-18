<?php

namespace Tests\Controllers;

use App\Controllers\SignUpController;
use App\Exceptions\UserAlreadyExistException;
use App\UseCases\LoginUseCase;
use App\UseCases\SignUpUseCase;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class SignUpControllerTest extends TestCase
{

    /**
     * @var MockObject|LoginUseCase
     */
    private $useCase;

    /**
     * @var MockObject|Twig
     */
    private $twig;

    /**
     * @var MockObject|Request
     */
    private $request;

    /**
     * @var MockObject|Response
     */
    private $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->useCase  = $this->createMock(SignUpUseCase::class);
        $this->twig     = $this->createMock(Twig::class);
        $this->request  = $this->createMock(Request::class);
        $this->response = $this->createMock(Response::class);
    }

    private function createSut()
    {
        return new SignUpController(
            $this->useCase,
            $this->twig
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
    public function testFailure(string $exceptionClass)
    {
        $exception = $this->createMock($exceptionClass);

        $this->request
            ->expects($this->exactly(3))
            ->method('getParam')
            ->withConsecutive(
                ['username'],
                ['email'],
                ['password']
            )
            ->willReturnOnConsecutiveCalls('username', 'email', 'password');

        $this->useCase
            ->expects($this->once())
            ->method('__invoke')
            ->willThrowException($exception);

        $this->twig
            ->expects($this->once())
            ->method('render')
            ->willReturn($this->response);

        $this->createSut()->__invoke($this->request, $this->response);
    }

    public function testSuccess()
    {
        $this->request
            ->expects($this->exactly(3))
            ->method('getParam')
            ->withConsecutive(
                ['username'],
                ['email'],
                ['password']
            )
            ->willReturnOnConsecutiveCalls('username', 'email', 'password');

        $this->useCase
            ->expects($this->once())
            ->method('__invoke');

        $this->twig
            ->expects($this->once())
            ->method('render')
            ->willReturn($this->response);
        $this->createSut()->__invoke($this->request, $this->response);
    }
}
