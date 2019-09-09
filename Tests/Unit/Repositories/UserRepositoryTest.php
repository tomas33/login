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
    private $EntityRepository;
    protected function setUp(): void
    {
        parent::setUp();

        $this->EntityRepository  = $this->createMock(EntityRepository::class);
        $this->User = $this->createMock(User::class);
        
    }

    private function createSut()
    {
        return new UserRepository (
            $this->EntityRepository,
            $this->User);
    }
    public function testUser(string $username,string $email)
    {
       $username = $this->createMock($username); 
       
        $this->EntityRepository
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



