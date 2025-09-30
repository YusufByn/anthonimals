<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250929144244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals ADD breed_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('CREATE INDEX IDX_966C69DDA8B4A30F ON animals (breed_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDA8B4A30F');
        $this->addSql('DROP INDEX IDX_966C69DDA8B4A30F ON animals');
        $this->addSql('ALTER TABLE animals DROP breed_id');
    }
}
