<?php

namespace App\Shorter;

use InvalidArgumentException;
use App\Shorter\CodeUrlModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Shorter\Interfaces\ICodeStorageInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\CodeDbStorageEntity;

class CodeDoctrineStorage implements Interfaces\ICodeStorageInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(string $code, string $url): void
    {
        $entity = new CodeDbStorageEntity($code, $url);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function find(string $code): ?string
    {
        $repository = $this->entityManager->getRepository(CodeDbStorageEntity::class);
        $entity = $repository->findOneBy(['code' => $code]);

        if (!$entity) {
            throw new InvalidArgumentException('Not found');
        }

        return $entity->getUrl();
    }
}