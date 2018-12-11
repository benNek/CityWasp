<?php

namespace App\Repository;

use App\Entity\Aikstele;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Aikstele|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aikstele|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aikstele[]    findAll()
 * @method Aikstele[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AiksteleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Aikstele::class);
    }

    // /**
    //  * @return Aikstele[] Returns an array of Aikstele objects
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
    public function findOneBySomeField($value): ?Aikstele
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
