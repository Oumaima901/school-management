<?php

namespace App\Repository;

use App\Entity\Aboutpage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aboutpage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aboutpage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aboutpage[]    findAll()
 * @method Aboutpage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AboutpageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aboutpage::class);
    }

    // /**
    //  * @return Aboutpage[] Returns an array of Aboutpage objects
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
    public function findOneBySomeField($value): ?Aboutpage
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
