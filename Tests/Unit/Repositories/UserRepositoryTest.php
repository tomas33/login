<?php

use App\Domain\User;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @var username|string
     */
    private $username;
    /**
     * @var email|string
     */
    private $email;
    /**
     * @var password|string
     */
    private $password;
    protected function setUp(): void
    {
        parent::setUp();

        $this->user  = $this->createMock(User::class);
        
    }

    private function createSut()
    {
        return new User(
            $this->username,
            $this->email,
            $this->password
        );
    }
    public function testUser(string $username,string $email,string $password)
    {
    
        $email = $email('test@test.es');
        $username = $username('test');
        $password = $password('kjhjj');

        $userRepository = $this->createMock(EntityRepository::class);
        $userRepository->expects($this->any())
            ->method('findUserByUsernameOrEmail')
            ->willReturn($userRepository);

    
        $objectManager = $this->createMock(ObjectManager::class);
    
        $objectManager->expects($this->any())
            ->method('getRepository')
            ->willReturn($userRepository);

        $findUserByUsernameOrEmail = new findUserByUsernameOrEmail($objectManager);
        $this->assertEquals(2100, $findUserByUsernameOrEmail());
    }
}



