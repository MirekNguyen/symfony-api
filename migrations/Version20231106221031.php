<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106221031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE library_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loan_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE person_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE author (id INT NOT NULL, birth_date DATE NOT NULL, death_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE book (id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, reviews INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE book_author (book_id INT NOT NULL, author_id INT NOT NULL, PRIMARY KEY(book_id, author_id))');
        $this->addSql('CREATE INDEX IDX_9478D34516A2B381 ON book_author (book_id)');
        $this->addSql('CREATE INDEX IDX_9478D345F675F31B ON book_author (author_id)');
        $this->addSql('CREATE TABLE library (id INT NOT NULL, street VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE library_book (library_id INT NOT NULL, book_id INT NOT NULL, PRIMARY KEY(library_id, book_id))');
        $this->addSql('CREATE INDEX IDX_6D2A695CFE2541D7 ON library_book (library_id)');
        $this->addSql('CREATE INDEX IDX_6D2A695C16A2B381 ON library_book (book_id)');
        $this->addSql('CREATE TABLE loan (id INT NOT NULL, date_borrowed DATE NOT NULL, date_returned DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE loan_book (loan_id INT NOT NULL, book_id INT NOT NULL, PRIMARY KEY(loan_id, book_id))');
        $this->addSql('CREATE INDEX IDX_1A48D945CE73868F ON loan_book (loan_id)');
        $this->addSql('CREATE INDEX IDX_1A48D94516A2B381 ON loan_book (book_id)');
        $this->addSql('CREATE TABLE person (id INT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE author ADD CONSTRAINT FK_BDAFD8C8BF396750 FOREIGN KEY (id) REFERENCES person (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D34516A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D345F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE library_book ADD CONSTRAINT FK_6D2A695CFE2541D7 FOREIGN KEY (library_id) REFERENCES library (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE library_book ADD CONSTRAINT FK_6D2A695C16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loan_book ADD CONSTRAINT FK_1A48D945CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loan_book ADD CONSTRAINT FK_1A48D94516A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE book_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE library_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE loan_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE person_id_seq CASCADE');
        $this->addSql('ALTER TABLE author DROP CONSTRAINT FK_BDAFD8C8BF396750');
        $this->addSql('ALTER TABLE book_author DROP CONSTRAINT FK_9478D34516A2B381');
        $this->addSql('ALTER TABLE book_author DROP CONSTRAINT FK_9478D345F675F31B');
        $this->addSql('ALTER TABLE library_book DROP CONSTRAINT FK_6D2A695CFE2541D7');
        $this->addSql('ALTER TABLE library_book DROP CONSTRAINT FK_6D2A695C16A2B381');
        $this->addSql('ALTER TABLE loan_book DROP CONSTRAINT FK_1A48D945CE73868F');
        $this->addSql('ALTER TABLE loan_book DROP CONSTRAINT FK_1A48D94516A2B381');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_author');
        $this->addSql('DROP TABLE library');
        $this->addSql('DROP TABLE library_book');
        $this->addSql('DROP TABLE loan');
        $this->addSql('DROP TABLE loan_book');
        $this->addSql('DROP TABLE person');
    }
}
