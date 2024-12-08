<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928092410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE date_rdv ADD id_client_id INT NOT NULL');
        $this->addSql('ALTER TABLE date_rdv ADD CONSTRAINT FK_A1CF58F399DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_A1CF58F399DED506 ON date_rdv (id_client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE date_rdv DROP FOREIGN KEY FK_A1CF58F399DED506');
        $this->addSql('DROP INDEX IDX_A1CF58F399DED506 ON date_rdv');
        $this->addSql('ALTER TABLE date_rdv DROP id_client_id');
    }
}
