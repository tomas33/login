<?php

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class BaseRepository extends EntityRepository
{
    public function persist($entity): void
    {
        $this->getEntityManager()->persist($entity);
    }

    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}

