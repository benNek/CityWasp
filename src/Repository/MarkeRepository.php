<?php

namespace App\Repository;

use App\Entity\Marke;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Marke|null find($id, $lockMode = null, $lockVersion = null)
 * @method Marke|null findOneBy(array $criteria, array $orderBy = null)
 * @method Marke[]    findAll()
 * @method Marke[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarkeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Marke::class);
    }

    public function findById($id)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult()
        ;
    }

}
