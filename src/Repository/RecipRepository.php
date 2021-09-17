<?php

namespace App\Repository;

use App\Entity\Recip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recip[]    findAll()
 * @method Recip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recip::class);
    }

    // /**
    //  * @return Recip[] Returns an array of Recip objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Recip
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
