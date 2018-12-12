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

    public function findById($id)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id_AUTOMOBILIS = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult()
        ;
    }

    public function findByMarke($marke)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.fk_marke = :marke')
            ->setParameter('marke', $marke)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByPavaruDeze($val)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.pavaru_deze = :val')
            ->setParameter('val', $val)
            ->getQuery()
            ->getResult()
        ;
    }

    public function FindFromYear($val)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.pagaminimo_metai >= :val')
            ->setParameter('val', $val)
            ->getQuery()
            ->getResult()
        ;
    }

    public function FindToYear($val)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.pagaminimo_metai <= :val')
            ->setParameter('val', $val)
            ->getQuery()
            ->getResult()
        ;
    }

    public function FindFromPrice($val)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.minutes_kaina >= :val')
            ->setParameter('val', $val)
            ->getQuery()
            ->getResult()
        ;
    }

    public function FindToPrice($val)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.minutes_kaina <= :val')
            ->setParameter('val', $val)
            ->getQuery()
            ->getResult()
        ;
    }

}
