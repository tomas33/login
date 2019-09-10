<?php

use App\Repositories\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * @var ClassMetadata|MockObject
     */
    private $classMetadata;

    /**
     * @var EntityManager|MockObject
     */
    private $entityManager;

    /**
     * @var QueryBuilder|MockObject
     */
    private $queryBuilder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->entityManager  = $this->createMock(EntityManager::class);
        $this->classMetadata = $this->createMock(ClassMetadata::class);
        $this->queryBuilder = $this->createMock(QueryBuilder::class);
    }

    private function createSut(): UserRepository
    {
        return new UserRepository(
            $this->entityManager,
            $this->classMetadata
        );
    }

    public function testUser()
    {
        $this->entityManager
             ->expects($this->once())
             ->method('createQueryBuilder')
             ->willReturn($this->queryBuilder);

        $this->queryBuilder
             ->expects($this->once())
             ->method('select')
             ->with('u')
             ->willReturnSelf();

        $this->queryBuilder
             ->expects($this->once())
             ->method('from')
             ->willReturnSelf();

        $this->queryBuilder
            ->expects($this->once())
            ->method('andWhere')
            ->with('u.username = :username')
            ->willReturnSelf();

        $this->createSut()->findUserByUsernameOrEmail('test', 'test@test.es');
    }
}
