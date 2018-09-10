<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910193802_deposit_create extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql(
            "CREATE TABLE deposit(
              id BIGINT AUTO_INCREMENT NOT NULL,
              account_id BIGINT NOT NULL,
              percent DOUBLE(2,1) NOT NULL,
              start_dt DATETIME NOT NULL,
              close_dt DATETIME NOT NULL,
              PRIMARY KEY(id),
              CONSTRAINT FK_account_deposit
              FOREIGN KEY (account_id) REFERENCES account(id)
                ON DELETE RESTRICT
            ) ENGINE = INNODB;
            "
        );
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('deposit');
    }
}
