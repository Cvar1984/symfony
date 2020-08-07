<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200806212936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'ALTER TABLE product ADD COLUMN color VARCHAR(1024) DEFAULT NULL'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, price, description FROM product'
        );
        $this->addSql('DROP TABLE product');
        $this->addSql(
            'CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INTEGER NOT NULL, description CLOB NOT NULL)'
        );
        $this->addSql(
            'INSERT INTO product (id, name, price, description) SELECT id, name, price, description FROM __temp__product'
        );
        $this->addSql('DROP TABLE __temp__product');
    }
}
