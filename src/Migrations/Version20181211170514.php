<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211170514 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE experience_professionnelle ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience_professionnelle ADD CONSTRAINT FK_4FC854EFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4FC854EFA76ED395 ON experience_professionnelle (user_id)');
        $this->addSql('ALTER TABLE formation ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_404021BFA76ED395 ON formation (user_id)');
        $this->addSql('ALTER TABLE offre CHANGE created_at created_at DATETIME NOT NULL, CHANGE ending_at ending_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495200282E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498F978030');
        $this->addSql('DROP INDEX IDX_8D93D6495200282E ON user');
        $this->addSql('DROP INDEX IDX_8D93D6498F978030 ON user');
        $this->addSql('ALTER TABLE user DROP formation_id, DROP experience_professionnelle_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE experience_professionnelle DROP FOREIGN KEY FK_4FC854EFA76ED395');
        $this->addSql('DROP INDEX IDX_4FC854EFA76ED395 ON experience_professionnelle');
        $this->addSql('ALTER TABLE experience_professionnelle DROP user_id');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFA76ED395');
        $this->addSql('DROP INDEX IDX_404021BFA76ED395 ON formation');
        $this->addSql('ALTER TABLE formation DROP user_id');
        $this->addSql('ALTER TABLE offre CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE ending_at ending_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD formation_id INT DEFAULT NULL, ADD experience_professionnelle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498F978030 FOREIGN KEY (experience_professionnelle_id) REFERENCES experience_professionnelle (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6495200282E ON user (formation_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498F978030 ON user (experience_professionnelle_id)');
    }
}
