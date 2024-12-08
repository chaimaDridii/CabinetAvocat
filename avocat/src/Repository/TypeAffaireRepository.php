<?php

namespace App\Repository;

use App\Entity\TypeAffaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeAffaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAffaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAffaire[]    findAll()
 * @method TypeAffaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAffaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeAffaire::class);
    }

    // /**
    //  * @return TypeAffaire[] Returns an array of TypeAffaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeAffaire
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
