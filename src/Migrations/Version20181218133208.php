<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181218133208 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, titre_offre VARCHAR(30) NOT NULL, mail_user VARCHAR(50) NOT NULL, mail_entreprise VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, raison_sociale VARCHAR(50) NOT NULL, image_name VARCHAR(255) NOT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL, email VARCHAR(50) NOT NULL, telephone VARCHAR(11) NOT NULL, INDEX IDX_D19FA603DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, type_evenement_id INT NOT NULL, user_id INT NOT NULL, titre_evenement VARCHAR(30) NOT NULL, description_evenement LONGTEXT NOT NULL, created_at_evenement DATETIME NOT NULL, ending_at_evenement DATETIME NOT NULL, statut_evenement TINYINT(1) NOT NULL, validation_evenement TINYINT(1) NOT NULL, INDEX IDX_B26681EA73F0036 (ville_id), INDEX IDX_B26681E88939516 (type_evenement_id), INDEX IDX_B26681EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience_professionnelle (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_debut_exp DATETIME NOT NULL, date_fin_exp DATETIME NOT NULL, a_today_exp TINYINT(1) DEFAULT NULL, titre_exp VARCHAR(30) DEFAULT NULL, entreprise_exp VARCHAR(30) DEFAULT NULL, description_exp TINYTEXT DEFAULT NULL, INDEX IDX_4FC854EFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, a_today TINYINT(1) DEFAULT NULL, titre VARCHAR(30) DEFAULT NULL, etablissement VARCHAR(30) DEFAULT NULL, description TINYTEXT DEFAULT NULL, INDEX IDX_404021BFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_object (id INT AUTO_INCREMENT NOT NULL, content_url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_etude (id INT AUTO_INCREMENT NOT NULL, libelle_niveau_etude VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_experience_global (id INT AUTO_INCREMENT NOT NULL, libelle_niveau_experience_global VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, entreprise_id INT NOT NULL, type_contrat_id INT NOT NULL, secteur_id INT NOT NULL, user_id INT NOT NULL, titre_offre VARCHAR(30) NOT NULL, description_offre LONGTEXT NOT NULL, created_at DATETIME NOT NULL, ending_at DATETIME NOT NULL, statut TINYINT(1) NOT NULL, validation TINYINT(1) NOT NULL, INDEX IDX_AF86866FA73F0036 (ville_id), INDEX IDX_AF86866FA4AEAFEA (entreprise_id), INDEX IDX_AF86866F520D03A (type_contrat_id), INDEX IDX_AF86866F9F7E4405 (secteur_id), INDEX IDX_AF86866FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur (id INT AUTO_INCREMENT NOT NULL, libelle_secteur VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_secteur (id INT AUTO_INCREMENT NOT NULL, secteur_id INT NOT NULL, libelle_sous_secteur VARCHAR(30) NOT NULL, INDEX IDX_A34C5D529F7E4405 (secteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_contrat (id INT AUTO_INCREMENT NOT NULL, libelle_contrat VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_evenement (id INT AUTO_INCREMENT NOT NULL, libelle_type_evenement VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, niveau_etude_id INT DEFAULT NULL, niveau_experience_global_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', fullname VARCHAR(255) DEFAULT NULL, nom VARCHAR(15) DEFAULT NULL, prenom VARCHAR(40) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), INDEX IDX_8D93D649FEAD13D1 (niveau_etude_id), INDEX IDX_8D93D6491280E2A8 (niveau_experience_global_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, libelle_ville VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA603DA5256D FOREIGN KEY (image_id) REFERENCES media_object (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E88939516 FOREIGN KEY (type_evenement_id) REFERENCES type_evenement (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE experience_professionnelle ADD CONSTRAINT FK_4FC854EFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F520D03A FOREIGN KEY (type_contrat_id) REFERENCES type_contrat (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F9F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sous_secteur ADD CONSTRAINT FK_A34C5D529F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FEAD13D1 FOREIGN KEY (niveau_etude_id) REFERENCES niveau_etude (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491280E2A8 FOREIGN KEY (niveau_experience_global_id) REFERENCES niveau_experience_global (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FA4AEAFEA');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA603DA5256D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FEAD13D1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491280E2A8');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F9F7E4405');
        $this->addSql('ALTER TABLE sous_secteur DROP FOREIGN KEY FK_A34C5D529F7E4405');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F520D03A');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E88939516');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EA76ED395');
        $this->addSql('ALTER TABLE experience_professionnelle DROP FOREIGN KEY FK_4FC854EFA76ED395');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFA76ED395');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FA76ED395');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EA73F0036');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FA73F0036');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE experience_professionnelle');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE media_object');
        $this->addSql('DROP TABLE niveau_etude');
        $this->addSql('DROP TABLE niveau_experience_global');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE secteur');
        $this->addSql('DROP TABLE sous_secteur');
        $this->addSql('DROP TABLE type_contrat');
        $this->addSql('DROP TABLE type_evenement');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE ville');
    }
}
