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

    // /**
    //  * @return Marke[] Returns an array of Marke objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Marke
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
