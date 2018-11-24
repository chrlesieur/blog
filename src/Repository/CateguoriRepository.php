<?php

namespace App\Repository;

use App\Entity\Categuori;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Categuori|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categuori|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categuori[]    findAll()
 * @method Categuori[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CateguoriRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Categuori::class);
    }

//    /**
//     * @return Categuori[] Returns an array of Categuori objects
//     */
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
    public function findOneBySomeField($value): ?Categuori
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
