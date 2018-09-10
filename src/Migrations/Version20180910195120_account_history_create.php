<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910195120_account_history_create extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql(
            "CREATE TABLE account_history(
              id BIGINT AUTO_INCREMENT NOT NULL,
              account_id BIGINT NOT NULL,
              sum DOUBLE(9,2) NOT NULL DEFAULT 0.00,
              create_dt DATETIME NOT NULL,
              PRIMARY KEY(id),
              CONSTRAINT FK_account_a_history
              FOREIGN KEY (account_id) REFERENCES account(id)
                ON DELETE RESTRICT
            ) ENGINE = INNODB;
            "
        );
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('account_history');
    }
}
