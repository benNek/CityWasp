<?php

namespace App\Repository;

use App\Entity\PavaruDeze;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PavaruDeze|null find($id, $lockMode = null, $lockVersion = null)
 * @method PavaruDeze|null findOneBy(array $criteria, array $orderBy = null)
 * @method PavaruDeze[]    findAll()
 * @method PavaruDeze[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PavaruDezeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PavaruDeze::class);
    }

    public function findById($id)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id_PAVARU_DEZE = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult()
        ;
    }

}
