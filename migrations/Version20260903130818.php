<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260903130818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absences ADD CONSTRAINT FK_F9C0EFFF7FE4B2B FOREIGN KEY (id_type) REFERENCES type_absence (id_type)');
        $this->addSql('ALTER TABLE absences ADD CONSTRAINT FK_F9C0EFFF69BE0643 FOREIGN KEY (id_student) REFERENCES student (id_student)');
        $this->addSql('ALTER TABLE student ADD student_active TINYINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absences DROP FOREIGN KEY FK_F9C0EFFF7FE4B2B');
        $this->addSql('ALTER TABLE absences DROP FOREIGN KEY FK_F9C0EFFF69BE0643');
        $this->addSql('ALTER TABLE student DROP student_active');
    }
}
