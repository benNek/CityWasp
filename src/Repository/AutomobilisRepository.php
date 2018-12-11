<?php

namespace App\Repository;

use App\Entity\Automobilis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Automobilis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Automobilis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Automobilis[]    findAll()
 * @method Automobilis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutomobilisRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Automobilis::class);
    }

    // /**
    //  * @return Automobilis[] Returns an array of Automobilis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Automobilis
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
