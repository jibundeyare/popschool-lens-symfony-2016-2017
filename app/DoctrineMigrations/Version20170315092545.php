<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170315092545 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, corps LONGTEXT NOT NULL, publication DATETIME NOT NULL, INDEX IDX_23A0E6660BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_tags (article_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_354053617294869C (article_id), INDEX IDX_35405361BAD26311 (tag_id), PRIMARY KEY(article_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, coupeDeCheveux VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_389B7836C6E55B5 (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6660BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
        $this->addSql('ALTER TABLE articles_tags ADD CONSTRAINT FK_354053617294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_tags ADD CONSTRAINT FK_35405361BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles_tags DROP FOREIGN KEY FK_354053617294869C');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6660BB6FE6');
        $this->addSql('ALTER TABLE articles_tags DROP FOREIGN KEY FK_35405361BAD26311');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE articles_tags');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE tag');
    }
}
