<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910194237_deposit_accrual_create extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql(
            "CREATE TABLE deposit_accrual(
              id BIGINT AUTO_INCREMENT NOT NULL,
              deposit_id BIGINT NOT NULL,
              sum DOUBLE(9,2) NOT NULL DEFAULT 0.00,
              create_dt DATETIME NOT NULL,
              PRIMARY KEY(id),
              CONSTRAINT FK_deposit_d_accrual
              FOREIGN KEY (deposit_id) REFERENCES deposit(id)
                ON DELETE RESTRICT
            ) ENGINE = INNODB;
            "
        );
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('deposit_accrual');
    }
}
