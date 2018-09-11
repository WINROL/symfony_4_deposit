<?php

namespace App\Repository;

use App\Entity\DepositAccural;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DepositAccural|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepositAccural|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepositAccural[]    findAll()
 * @method DepositAccural[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepositAccuralRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DepositAccural::class);
    }

//    /**
//     * @return DepositAccural[] Returns an array of DepositAccural objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepositAccural
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
