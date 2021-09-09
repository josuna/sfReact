<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210909045254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE invoice_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE invoice_detail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plan_detail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_price_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE shopping_plans_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE supplier_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(100) NOT NULL, photo BYTEA DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN category.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN category.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE invoice (id INT NOT NULL, code VARCHAR(25) NOT NULL, note VARCHAR(1000) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN invoice.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN invoice.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE invoice_detail (id INT NOT NULL, invoice_id_id INT DEFAULT NULL, product_price_id_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9530E2C0429ECEE2 ON invoice_detail (invoice_id_id)');
        $this->addSql('CREATE INDEX IDX_9530E2C0F8A20828 ON invoice_detail (product_price_id_id)');
        $this->addSql('COMMENT ON COLUMN invoice_detail.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN invoice_detail.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE plan_detail (id INT NOT NULL, shopping_plan_id_id INT DEFAULT NULL, product_price_id_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9A5E67E1332D3CFD ON plan_detail (shopping_plan_id_id)');
        $this->addSql('CREATE INDEX IDX_9A5E67E1F8A20828 ON plan_detail (product_price_id_id)');
        $this->addSql('COMMENT ON COLUMN plan_detail.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN plan_detail.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, category_id_id INT DEFAULT NULL, code VARCHAR(25) NOT NULL, name VARCHAR(255) NOT NULL, unit VARCHAR(25) NOT NULL, photo BYTEA DEFAULT NULL, description VARCHAR(1000) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D34A04AD9777D11E ON product (category_id_id)');
        $this->addSql('COMMENT ON COLUMN product.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN product.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE product_price (id INT NOT NULL, product_id_id INT DEFAULT NULL, supplier_id_id INT DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B945985DE18E50B ON product_price (product_id_id)');
        $this->addSql('CREATE INDEX IDX_6B945985A65F9C7D ON product_price (supplier_id_id)');
        $this->addSql('COMMENT ON COLUMN product_price.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN product_price.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE shopping_plans (id INT NOT NULL, code VARCHAR(25) NOT NULL, note VARCHAR(1000) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN shopping_plans.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN shopping_plans.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE supplier (id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(500) DEFAULT NULL, photos BYTEA DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN supplier.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN supplier.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE invoice_detail ADD CONSTRAINT FK_9530E2C0429ECEE2 FOREIGN KEY (invoice_id_id) REFERENCES invoice (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice_detail ADD CONSTRAINT FK_9530E2C0F8A20828 FOREIGN KEY (product_price_id_id) REFERENCES product_price (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_detail ADD CONSTRAINT FK_9A5E67E1332D3CFD FOREIGN KEY (shopping_plan_id_id) REFERENCES shopping_plans (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_detail ADD CONSTRAINT FK_9A5E67E1F8A20828 FOREIGN KEY (product_price_id_id) REFERENCES product_price (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_price ADD CONSTRAINT FK_6B945985DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_price ADD CONSTRAINT FK_6B945985A65F9C7D FOREIGN KEY (supplier_id_id) REFERENCES supplier (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD9777D11E');
        $this->addSql('ALTER TABLE invoice_detail DROP CONSTRAINT FK_9530E2C0429ECEE2');
        $this->addSql('ALTER TABLE product_price DROP CONSTRAINT FK_6B945985DE18E50B');
        $this->addSql('ALTER TABLE invoice_detail DROP CONSTRAINT FK_9530E2C0F8A20828');
        $this->addSql('ALTER TABLE plan_detail DROP CONSTRAINT FK_9A5E67E1F8A20828');
        $this->addSql('ALTER TABLE plan_detail DROP CONSTRAINT FK_9A5E67E1332D3CFD');
        $this->addSql('ALTER TABLE product_price DROP CONSTRAINT FK_6B945985A65F9C7D');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE invoice_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE invoice_detail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE plan_detail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_price_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE shopping_plans_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE supplier_id_seq CASCADE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_detail');
        $this->addSql('DROP TABLE plan_detail');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_price');
        $this->addSql('DROP TABLE shopping_plans');
        $this->addSql('DROP TABLE supplier');
    }
}
