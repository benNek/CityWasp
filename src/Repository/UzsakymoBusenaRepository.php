<?php

namespace App\Repository;

use App\Entity\UzsakymoBusena;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UzsakymoBusena|null find($id, $lockMode = null, $lockVersion = null)
 * @method UzsakymoBusena|null findOneBy(array $criteria, array $orderBy = null)
 * @method UzsakymoBusena[]    findAll()
 * @method UzsakymoBusena[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UzsakymoBusenaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UzsakymoBusena::class);
    }

    // /**
    //  * @return UzsakymoBusena[] Returns an array of UzsakymoBusena objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UzsakymoBusena
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
