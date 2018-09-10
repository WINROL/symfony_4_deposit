<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180910185128_client_create_table extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql(
            "CREATE TABLE client(
              id BIGINT AUTO_INCREMENT NOT NULL,
              inn BIGINT(12) UNSIGNED NOT NULL,
              name VARCHAR(30) NOT NULL,
              last_name VARCHAR(30) NOT NULL,
              gender TINYINT(1) NOT NULL,
              birth_date DATE,
              INDEX IDX_client_bd(birth_date),
              PRIMARY KEY(id)
            ) ENGINE = INNODB;
            "
        );
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('client');
    }
}
