<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211017152324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_autorisation_abs (id INT AUTO_INCREMENT NOT NULL, collaborateur_id INT DEFAULT NULL, typeabsence_id INT DEFAULT NULL, numdemande INT NOT NULL, datedemande DATE NOT NULL, date VARCHAR(255) NOT NULL, dateretour DATE NOT NULL, piecejustificative VARCHAR(255) NOT NULL, INDEX IDX_998DED72A848E3B1 (collaborateur_id), INDEX IDX_998DED72D4A5C382 (typeabsence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_autorisation_abs ADD CONSTRAINT FK_998DED72A848E3B1 FOREIGN KEY (collaborateur_id) REFERENCES collaborateur (id)');
        $this->addSql('ALTER TABLE demande_autorisation_abs ADD CONSTRAINT FK_998DED72D4A5C382 FOREIGN KEY (typeabsence_id) REFERENCES type_absence (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande_autorisation_abs');
    }
}
