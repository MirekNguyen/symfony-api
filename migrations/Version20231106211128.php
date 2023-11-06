<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106211128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE library_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loan_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE library (id INT NOT NULL, street VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE loan (id INT NOT NULL, date_borrowed DATE NOT NULL, date_returned DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE loan_book (loan_id INT NOT NULL, book_id INT NOT NULL, PRIMARY KEY(loan_id, book_id))');
        $this->addSql('CREATE INDEX IDX_1A48D945CE73868F ON loan_book (loan_id)');
        $this->addSql('CREATE INDEX IDX_1A48D94516A2B381 ON loan_book (book_id)');
        $this->addSql('ALTER TABLE loan_book ADD CONSTRAINT FK_1A48D945CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loan_book ADD CONSTRAINT FK_1A48D94516A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE library_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE loan_id_seq CASCADE');
        $this->addSql('ALTER TABLE loan_book DROP CONSTRAINT FK_1A48D945CE73868F');
        $this->addSql('ALTER TABLE loan_book DROP CONSTRAINT FK_1A48D94516A2B381');
        $this->addSql('DROP TABLE library');
        $this->addSql('DROP TABLE loan');
        $this->addSql('DROP TABLE loan_book');
    }
}
