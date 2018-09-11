<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180911105707 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE deposit (id INT AUTO_INCREMENT NOT NULL, account_id BIGINT NOT NULL, percent NUMERIC(3, 1) NOT NULL, start_dt DATETIME NOT NULL, close_dt DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_95DB9D399B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE account (id BIGINT AUTO_INCREMENT NOT NULL, client_id BIGINT NOT NULL, currency VARCHAR(3) NOT NULL, sum INT NOT NULL, INDEX IDX_7D3656A419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deposit_accural (id BIGINT AUTO_INCREMENT NOT NULL, deposit_id INT NOT NULL, sum NUMERIC(9, 2) NOT NULL, create_dt DATETIME NOT NULL, INDEX IDX_D2E389189815E4B1 (deposit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE account_history (id BIGINT AUTO_INCREMENT NOT NULL, account_id BIGINT NOT NULL, sum NUMERIC(9, 2) NOT NULL, create_dt DATETIME NOT NULL, INDEX IDX_EE9164039B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id BIGINT AUTO_INCREMENT NOT NULL, inn BIGINT UNSIGNED NOT NULL, name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, gender SMALLINT UNSIGNED NOT NULL, birth_date DATE NOT NULL, UNIQUE INDEX IDX_c_inn (inn), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deposit ADD CONSTRAINT FK_95DB9D399B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A419EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE deposit_accural ADD CONSTRAINT FK_D2E389189815E4B1 FOREIGN KEY (deposit_id) REFERENCES deposit (id)');
        $this->addSql('ALTER TABLE account_history ADD CONSTRAINT FK_EE9164039B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE deposit_accural DROP FOREIGN KEY FK_D2E389189815E4B1');
        $this->addSql('ALTER TABLE deposit DROP FOREIGN KEY FK_95DB9D399B6B5FBA');
        $this->addSql('ALTER TABLE account_history DROP FOREIGN KEY FK_EE9164039B6B5FBA');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A419EB6921');
        $this->addSql('DROP TABLE deposit');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE deposit_accural');
        $this->addSql('DROP TABLE account_history');
        $this->addSql('DROP TABLE client');
    }
}
