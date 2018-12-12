<?php

namespace App\Repository;

use App\Entity\Uzsakymas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @method Uzsakymas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uzsakymas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uzsakymas[]    findAll()
 * @method Uzsakymas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UzsakymasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uzsakymas::class);
    }

    public function getAllOrderData($id)
    {

        $sql = "SELECT a.paemimo_data, a.grazinimo_data, a.uzsakymo_busena, a.fk_DARBUOTOJASdarbuotojo_id, a.fk_KLIENTAS, a.fk_AUTOMOBILISid_AUTOMOBILIS, 
                        b.valstybinis_nr, b.modelis, b.kuras, b.minutes_kaina, c.adresas, d.pavadinimas, e.name, a.id_UZSAKYMAS, f.suma
                FROM App:Uzsakymas a 
                INNER JOIN App:Automobilis b 
                    WITH a.fk_AUTOMOBILISid_AUTOMOBILIS = b.id_AUTOMOBILIS
                INNER JOIN App:Aikstele c
                    WITH b.fk_AIKSTELEaiksteles_id = c.id_AIKSTELE
                INNER JOIN App:Marke d
                    WITH b.fk_marke = d.id
                INNER JOIN App:UzsakymoBusena e
                    WITH a.uzsakymo_busena = e.id_UZSAKYMO_BUSENA               
                LEFT JOIN App:Saskaita f
                    WITH a.id_UZSAKYMAS = f.id_SASKAITA
                WHERE a.fk_KLIENTAS = :id
        ";

        $result = $this->getEntityManager()->createQuery($sql)->setParameter('id', $id)->getResult();
        return ($result);
    }
    public function getOrderById($id)
    {

        $sql = "SELECT a.paemimo_data, a.grazinimo_data, a.uzsakymo_busena, a.fk_DARBUOTOJASdarbuotojo_id, a.fk_KLIENTAS, a.fk_AUTOMOBILISid_AUTOMOBILIS, 
                        b.valstybinis_nr, b.modelis, b.kuras, b.minutes_kaina, c.adresas, d.pavadinimas, e.name, a.id_UZSAKYMAS
                FROM App:Uzsakymas a 
                INNER JOIN App:Automobilis b 
                    WITH a.fk_AUTOMOBILISid_AUTOMOBILIS = b.id_AUTOMOBILIS
                INNER JOIN App:Aikstele c
                    WITH b.fk_AIKSTELEaiksteles_id = c.id_AIKSTELE
                INNER JOIN App:Marke d
                    WITH b.fk_marke = d.id
                INNER JOIN App:UzsakymoBusena e
                    WITH a.uzsakymo_busena = e.id_UZSAKYMO_BUSENA
                WHERE a.id_UZSAKYMAS = :id
        ";

        $result = $this->getEntityManager()->createQuery($sql)->setParameter('id', $id)->getResult();
        return ($result);
    }
    /**
     * @return Uzsakymas[] Returns an array of Uzsakymas objects for Klientas
     */
    public function getUsersOrders($id)
    {
        return $this->createQueryBuilder('u')
        ->andWhere('u.fk_KLIENTAS = :val')
        ->setParameter('val', $id)
        ->getQuery()
        ->getResult()
        ;
    }

    
    // /**
    //  * @return Uzsakymas[] Returns an array of Uzsakymas objects
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
    public function findOneBySomeField($value): ?Uzsakymas
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
