<?php

use App\Domain\User;
use App\Repositories\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * @var ClassMetadata|MockObject
     */
    private $classMetadata;
    /**
     * @var EntytiManager|MockObject
     */
    private $entityManager;
    protected function setUp(): void
    {
        parent::setUp();

        $this->entityManager  = $this->createMock(EntityManager::class);
        $this->classMetadata = $this->createMock(ClassMetadata::class);
        
    }

    private function createSut()
    {
        return new UserRepository (
            $this->entityManager,
            $this->classMetadata);
    }
    public function testUser($entityManager,$classMetadata)
    {
   
         $this->createMock($entityManager);
         $this->entity
        ->expects($this->exactly(2))
            ->method('andWhere')
            ->withConsecutive(
                ['username'],
                ['email'])

            ->willReturnOnConsecutiveCalls('username', 
                 'email');

        $this->createSut()->findUserByUsernameOrEmail('test','test@test.es');
    }
}



