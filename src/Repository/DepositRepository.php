<?php

namespace App\Repository;

use App\Entity\Deposit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Deposit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Deposit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Deposit[]    findAll()
 * @method Deposit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepositRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Deposit::class);
    }

    public function getAverageSum(int $age1, ?int $age2 = null) :float
    {
        $conn = $this->getEntityManager()->getConnection();

        $dateStart = (new \DateTime())->modify("- {$age1} year")->format('Y-m-d');
        $dateEnd = '';
        if (null !== $age2) {
            $dateEnd = (new \DateTime())->modify("- {$age2} year")->format('Y-m-d');
        }

        $stmt = $conn->prepare(
            "SELECT
            ROUND(SUM(a.sum) / COUNT(d.id), 2) as avg
            FROM account a
            INNER JOIN client c ON c.id = a.client_id
            INNER JOIN deposit d ON d.account_id = a.id
            WHERE c.birth_date <= :dateStart AND ('' = :dateEnd OR c.birth_date > :dateEnd)"
        );

        $stmt->execute([
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd,
        ]);

        $result = number_format($stmt->fetchColumn(), 2, '.', '');

        return $result;
    }
}
