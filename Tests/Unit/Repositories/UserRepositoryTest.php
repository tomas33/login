<?php

use App\Domain\User;
use App\Repositories\UserRepository;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * @var user|MockObject
     */
    private $User;
    /**
     * @var EntytiRepository|MockObject
     */
    private $entityRepository;
    protected function setUp(): void
    {
        parent::setUp();

        $this->entityRepository  = $this->createMock(EntityRepository::class);
        $this->User = $this->createMock(User::class);
        
    }

    private function createSut()
    {
        return new UserRepository (
            $this->EntityRepository,
            $this->User);
    }
    public function testUser()
    {
   
        $this->UserRepository
        ->expects($this->exactly(2))
            ->method('findUserByUsernameOrEmail')
            ->withConsecutive(
                ['username'],
                ['email'])

            ->willReturnOnConsecutiveCalls('username', 
                 'email');

        $this->createSut()->findUserByUsernameOrEmail('test','test@test.es');
    }
}



