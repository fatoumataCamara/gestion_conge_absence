<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012222142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_conge (id INT AUTO_INCREMENT NOT NULL, collaborateur_id INT DEFAULT NULL, typeconge_id INT NOT NULL, numdemande INT NOT NULL, datedemande DATE NOT NULL, datedebut DATE NOT NULL, dateretour DATE NOT NULL, piecejustificative VARCHAR(255) NOT NULL, INDEX IDX_D8061061A848E3B1 (collaborateur_id), INDEX IDX_D806106196C514D1 (typeconge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_conge ADD CONSTRAINT FK_D8061061A848E3B1 FOREIGN KEY (collaborateur_id) REFERENCES collaborateur (id)');
        $this->addSql('ALTER TABLE demande_conge ADD CONSTRAINT FK_D806106196C514D1 FOREIGN KEY (typeconge_id) REFERENCES type_conge (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande_conge');
    }
}
