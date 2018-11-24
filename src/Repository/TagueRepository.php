<?php

namespace App\Repository;

use App\Entity\Tague;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tague|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tague|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tague[]    findAll()
 * @method Tague[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tague::class);
    }

//    /**
//     * @return Tague[] Returns an array of Tague objects
//     */
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
    public function findOneBySomeField($value): ?Tague
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
