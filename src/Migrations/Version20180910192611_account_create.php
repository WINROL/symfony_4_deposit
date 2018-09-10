<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910192611_account_create extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql(
            "CREATE TABLE account(
              id BIGINT AUTO_INCREMENT NOT NULL,
              client_id BIGINT NOT NULL,
              currency VARCHAR(3) NOT NULL,
              sum DOUBLE(9,2) NOT NULL DEFAULT 0.00,
              PRIMARY KEY(id),
              CONSTRAINT FK_client_account
              FOREIGN KEY (client_id) REFERENCES client(id)
                ON DELETE RESTRICT
            ) ENGINE = INNODB;
            "
        );
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('account');
    }
}
