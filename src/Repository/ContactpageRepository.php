<?php

namespace App\Repository;

use App\Entity\Contactpage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contactpage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contactpage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contactpage[]    findAll()
 * @method Contactpage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactpageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contactpage::class);
    }

    // /**
    //  * @return Contactpage[] Returns an array of Contactpage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contactpage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
