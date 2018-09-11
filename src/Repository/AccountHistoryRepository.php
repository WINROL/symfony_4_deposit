<?php

namespace App\Repository;

use App\Entity\AccountHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AccountHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccountHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccountHistory[]    findAll()
 * @method AccountHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccountHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AccountHistory::class);
    }

    public function getSumForAllMonths(): ?array
    {
        $conn = $this->getEntityManager()->getConnection();

        $stmt = $conn->prepare(
            "SELECT 
              (SUM(sum)) * -1 as sum, 
              create_y_m as ym 
            FROM 
               account_history 
            GROUP BY create_y_m
            ORDER BY create_y_m ASC;

            ;"
        );

        $stmt->execute();
        if ($stmt->rowCount() < 1) {
            return null;
        }

        $result = [];
        while ($row = $stmt->fetch()) {
            $result[$row['ym']] = $row['sum'];
        }

        return $result;
    }
}
