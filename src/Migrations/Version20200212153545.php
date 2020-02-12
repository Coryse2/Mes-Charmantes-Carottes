<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200212153545 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vegetable (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vegetable_garden (vegetable_id INT NOT NULL, garden_id INT NOT NULL, INDEX IDX_F237FD223D33F4D6 (vegetable_id), INDEX IDX_F237FD2239F3B087 (garden_id), PRIMARY KEY(vegetable_id, garden_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garden (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_3C0918EAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE month (id INT AUTO_INCREMENT NOT NULL, season_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8EB610064EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season_vegetable (season_id INT NOT NULL, vegetable_id INT NOT NULL, INDEX IDX_50AADA184EC001D1 (season_id), INDEX IDX_50AADA183D33F4D6 (vegetable_id), PRIMARY KEY(season_id, vegetable_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vegetable_garden ADD CONSTRAINT FK_F237FD223D33F4D6 FOREIGN KEY (vegetable_id) REFERENCES vegetable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vegetable_garden ADD CONSTRAINT FK_F237FD2239F3B087 FOREIGN KEY (garden_id) REFERENCES garden (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE garden ADD CONSTRAINT FK_3C0918EAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE month ADD CONSTRAINT FK_8EB610064EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE season_vegetable ADD CONSTRAINT FK_50AADA184EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_vegetable ADD CONSTRAINT FK_50AADA183D33F4D6 FOREIGN KEY (vegetable_id) REFERENCES vegetable (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE garden DROP FOREIGN KEY FK_3C0918EAA76ED395');
        $this->addSql('ALTER TABLE vegetable_garden DROP FOREIGN KEY FK_F237FD223D33F4D6');
        $this->addSql('ALTER TABLE season_vegetable DROP FOREIGN KEY FK_50AADA183D33F4D6');
        $this->addSql('ALTER TABLE vegetable_garden DROP FOREIGN KEY FK_F237FD2239F3B087');
        $this->addSql('ALTER TABLE month DROP FOREIGN KEY FK_8EB610064EC001D1');
        $this->addSql('ALTER TABLE season_vegetable DROP FOREIGN KEY FK_50AADA184EC001D1');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vegetable');
        $this->addSql('DROP TABLE vegetable_garden');
        $this->addSql('DROP TABLE garden');
        $this->addSql('DROP TABLE month');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE season_vegetable');
    }
}
