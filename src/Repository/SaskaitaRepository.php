<?php

namespace App\Repository;

use App\Entity\Saskaita;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Saskaita|null find($id, $lockMode = null, $lockVersion = null)
 * @method Saskaita|null findOneBy(array $criteria, array $orderBy = null)
 * @method Saskaita[]    findAll()
 * @method Saskaita[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaskaitaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Saskaita::class);
    }

    // /**
    //  * @return Saskaita[] Returns an array of Saskaita objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Saskaita
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
