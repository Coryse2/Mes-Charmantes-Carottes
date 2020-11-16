<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201116204219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE month DROP FOREIGN KEY FK_8EB610064EC001D1');
        $this->addSql('ALTER TABLE season_vegetable DROP FOREIGN KEY FK_50AADA184EC001D1');
        $this->addSql('CREATE TABLE month_vegetable (month_id INT NOT NULL, vegetable_id INT NOT NULL, INDEX IDX_FF6A4953A0CBDE4 (month_id), INDEX IDX_FF6A49533D33F4D6 (vegetable_id), PRIMARY KEY(month_id, vegetable_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE month_vegetable ADD CONSTRAINT FK_FF6A4953A0CBDE4 FOREIGN KEY (month_id) REFERENCES month (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE month_vegetable ADD CONSTRAINT FK_FF6A49533D33F4D6 FOREIGN KEY (vegetable_id) REFERENCES vegetable (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE season_vegetable');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('DROP INDEX IDX_8EB610064EC001D1 ON month');
        $this->addSql('ALTER TABLE month ADD created_at DATETIME NOT NULL, ADD picked_at DATETIME DEFAULT NULL, DROP season_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE season_vegetable (season_id INT NOT NULL, vegetable_id INT NOT NULL, INDEX IDX_50AADA184EC001D1 (season_id), INDEX IDX_50AADA183D33F4D6 (vegetable_id), PRIMARY KEY(season_id, vegetable_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE season_vegetable ADD CONSTRAINT FK_50AADA183D33F4D6 FOREIGN KEY (vegetable_id) REFERENCES vegetable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_vegetable ADD CONSTRAINT FK_50AADA184EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE month_vegetable');
        $this->addSql('ALTER TABLE month ADD season_id INT NOT NULL, DROP created_at, DROP picked_at');
        $this->addSql('ALTER TABLE month ADD CONSTRAINT FK_8EB610064EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_8EB610064EC001D1 ON month (season_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
