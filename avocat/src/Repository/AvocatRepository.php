<?php

namespace App\Repository;

use App\Entity\Avocat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Avocat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avocat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avocat[]    findAll()
 * @method Avocat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvocatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avocat::class);
    }

    // /**
    //  * @return Avocat[] Returns an array of Avocat objects
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
    public function findOneBySomeField($value): ?Avocat
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
