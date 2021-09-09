<?php

namespace App\Repository;

use App\Entity\PlanDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanDetail[]    findAll()
 * @method PlanDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanDetail::class);
    }

    // /**
    //  * @return PlanDetail[] Returns an array of PlanDetail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanDetail
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
