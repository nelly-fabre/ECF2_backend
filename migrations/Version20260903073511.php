<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260903073511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE absences (id_absence INT AUTO_INCREMENT NOT NULL, absence_date_start DATE NOT NULL, absence_date_end DATE NOT NULL, absence_document VARCHAR(255) DEFAULT NULL, id_type INT NOT NULL, id_student INT NOT NULL, INDEX IDX_F9C0EFFF7FE4B2B (id_type), INDEX IDX_F9C0EFFF69BE0643 (id_student), PRIMARY KEY (id_absence)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE student (id_student INT AUTO_INCREMENT NOT NULL, student_id_afpa INT NOT NULL, student_family_name VARCHAR(50) NOT NULL, student_first_name VARCHAR(50) NOT NULL, student_picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id_student)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE type_absence (id_type INT AUTO_INCREMENT NOT NULL, type_name VARCHAR(50) NOT NULL, PRIMARY KEY (id_type)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE absences ADD CONSTRAINT FK_F9C0EFFF7FE4B2B FOREIGN KEY (id_type) REFERENCES type_absence (id_type)');
        $this->addSql('ALTER TABLE absences ADD CONSTRAINT FK_F9C0EFFF69BE0643 FOREIGN KEY (id_student) REFERENCES student (id_student)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absences DROP FOREIGN KEY FK_F9C0EFFF7FE4B2B');
        $this->addSql('ALTER TABLE absences DROP FOREIGN KEY FK_F9C0EFFF69BE0643');
        $this->addSql('DROP TABLE absences');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE type_absence');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
