<?php

namespace App\Repository;

use App\Entity\ShoppingPlans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShoppingPlans|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShoppingPlans|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShoppingPlans[]    findAll()
 * @method ShoppingPlans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoppingPlansRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShoppingPlans::class);
    }

    // /**
    //  * @return ShoppingPlans[] Returns an array of ShoppingPlans objects
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
    public function findOneBySomeField($value): ?ShoppingPlans
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
