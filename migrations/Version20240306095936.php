<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306095936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F1CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F1F347EFB FOREIGN KEY (produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE pageprincipales DROP image_5, DROP image_6');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE produits CHANGE vue1 vue1 VARCHAR(255) NOT NULL, CHANGE vue2 vue2 VARCHAR(255) NOT NULL, CHANGE vue3 vue3 VARCHAR(255) NOT NULL, CHANGE vue4 vue4 VARCHAR(255) NOT NULL, CHANGE vue5 vue5 VARCHAR(255) NOT NULL, CHANGE quantité quantite SMALLINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F1CFFE9AD6');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F1F347EFB');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEFB88E14F');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1EFB88E14F');
        $this->addSql('ALTER TABLE pageprincipales ADD image_5 VARCHAR(255) NOT NULL, ADD image_6 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produits CHANGE vue1 vue1 VARCHAR(255) DEFAULT NULL, CHANGE vue2 vue2 VARCHAR(255) DEFAULT NULL, CHANGE vue3 vue3 VARCHAR(255) DEFAULT NULL, CHANGE vue4 vue4 VARCHAR(255) DEFAULT NULL, CHANGE vue5 vue5 VARCHAR(255) DEFAULT NULL, CHANGE quantite quantité SMALLINT NOT NULL');
    }
}
