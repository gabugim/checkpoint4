<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722174057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, place INT NOT NULL, date DATE NOT NULL, short_description VARCHAR(450) NOT NULL, long_description VARCHAR(4500) NOT NULL, image VARCHAR(100) NOT NULL, title VARCHAR(100) NOT NULL, INDEX IDX_E1BB182312469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, short_description VARCHAR(450) NOT NULL, long_description VARCHAR(4500) NOT NULL, title VARCHAR(100) NOT NULL, image VARCHAR(250) NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, type_de_bien VARCHAR(450) NOT NULL, budget DOUBLE PRECISION NOT NULL, surface INT NOT NULL, description VARCHAR(4500) NOT NULL, mail VARCHAR(255) NOT NULL, telephone INT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(100) NOT NULL, INDEX IDX_8B27C52B12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tuto (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, image VARCHAR(100) DEFAULT NULL, updated_at DATETIME NOT NULL, title VARCHAR(100) NOT NULL, short_description VARCHAR(450) NOT NULL, long_description VARCHAR(4500) NOT NULL, INDEX IDX_17D825712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier ADD CONSTRAINT FK_E1BB182312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE tuto ADD CONSTRAINT FK_17D825712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier DROP FOREIGN KEY FK_E1BB182312469DE2');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B12469DE2');
        $this->addSql('ALTER TABLE tuto DROP FOREIGN KEY FK_17D825712469DE2');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE tuto');
        $this->addSql('DROP TABLE user');
    }
}
