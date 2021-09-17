<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914213650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE ingredient_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE recip_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE ingredient (id INT NOT NULL, name VARCHAR(255) NOT NULL, quantity INT NOT NULL, out_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE recip (id INT NOT NULL, name VARCHAR(255) NOT NULL, make_time TIME(0) WITHOUT TIME ZONE DEFAULT NULL, step JSON NOT NULL, tools JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE recip_ingredient (recip_id INT NOT NULL, ingredient_id INT NOT NULL, PRIMARY KEY(recip_id, ingredient_id))');
        $this->addSql('CREATE INDEX IDX_FB37E413BAA4FEB0 ON recip_ingredient (recip_id)');
        $this->addSql('CREATE INDEX IDX_FB37E413933FE08C ON recip_ingredient (ingredient_id)');
        $this->addSql('ALTER TABLE recip_ingredient ADD CONSTRAINT FK_FB37E413BAA4FEB0 FOREIGN KEY (recip_id) REFERENCES recip (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recip_ingredient ADD CONSTRAINT FK_FB37E413933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE recip_ingredient DROP CONSTRAINT FK_FB37E413933FE08C');
        $this->addSql('ALTER TABLE recip_ingredient DROP CONSTRAINT FK_FB37E413BAA4FEB0');
        $this->addSql('DROP SEQUENCE ingredient_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE recip_id_seq CASCADE');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE recip');
        $this->addSql('DROP TABLE recip_ingredient');
    }
}
