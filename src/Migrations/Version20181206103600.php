<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181206103600 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE klientas (id INT AUTO_INCREMENT NOT NULL, vardas VARCHAR(255) NOT NULL, pavarde VARCHAR(255) NOT NULL, slaptazodis VARCHAR(255) NOT NULL, adresas VARCHAR(255) NOT NULL, gimimo_data DATETIME NOT NULL, tel_nr VARCHAR(20) NOT NULL, el_pastas VARCHAR(255) NOT NULL, naujienlaiskiai INT NOT NULL, UNIQUE INDEX UNIQ_E777D96623C66146 (tel_nr), UNIQUE INDEX UNIQ_E777D96692CC1A4D (el_pastas), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE klientas');
    }
}
