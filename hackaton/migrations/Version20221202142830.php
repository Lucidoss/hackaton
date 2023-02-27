<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202142830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE conference');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE intervenant');
        $this->addSql('DROP TABLE intervenir');
        $this->addSql('DROP TABLE participantatelier');
        $this->addSql('DROP TABLE participer');
        $this->addSql('ALTER TABLE hackathon CHANGE DATEDEBUT datedebut DATE NOT NULL, CHANGE DATEFIN datefin DATE NOT NULL, CHANGE HEUREDEBUT heuredebut TIME NOT NULL, CHANGE HEUREFIN heurefin TIME NOT NULL, CHANGE LIEU lieu VARCHAR(255) NOT NULL, CHANGE RUE rue VARCHAR(255) NOT NULL, CHANGE VILLE ville VARCHAR(255) NOT NULL, CHANGE CP cp VARCHAR(5) NOT NULL, CHANGE THEME theme VARCHAR(255) NOT NULL, CHANGE DESCRIPTION description VARCHAR(255) NOT NULL, CHANGE IMAGE image VARCHAR(255) NOT NULL, CHANGE DATELIMITE datelimite DATE NOT NULL, CHANGE NBPLACES nbplaces INT NOT NULL');
        $this->addSql('ALTER TABLE participant CHANGE NOM nom VARCHAR(32) NOT NULL, CHANGE PRENOM prenom VARCHAR(32) NOT NULL, CHANGE DATENAISSANCE datenaissance DATE NOT NULL, CHANGE VILLE ville VARCHAR(64) NOT NULL, CHANGE RUE rue VARCHAR(128) NOT NULL, CHANGE CP cp VARCHAR(5) NOT NULL, CHANGE EMAIL email VARCHAR(32) NOT NULL, CHANGE LOGIN login VARCHAR(32) NOT NULL, CHANGE MDP mdp VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atelier (IDEVENEMENT INT NOT NULL, NBPARTICIPANTS INT DEFAULT NULL, NOMEVENEMENT CHAR(64) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, DATEDEBUT DATE DEFAULT \'NULL\', DATEFIN DATE DEFAULT \'NULL\', DUREE TIME DEFAULT \'NULL\', PRIMARY KEY(IDEVENEMENT)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE conference (IDEVENEMENT INT NOT NULL, THEME VARCHAR(128) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, NOMEVENEMENT CHAR(64) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, DATEDEBUT DATE DEFAULT \'NULL\', DATEFIN DATE DEFAULT \'NULL\', DUREE TIME DEFAULT \'NULL\', PRIMARY KEY(IDEVENEMENT)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evenement (IDEVENEMENT INT AUTO_INCREMENT NOT NULL, IDHACKATHON INT NOT NULL, NOMEVENEMENT CHAR(64) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, DATEDEBUT DATE DEFAULT \'NULL\', DATEFIN DATE DEFAULT \'NULL\', DUREE TIME DEFAULT \'NULL\', INDEX FK_EVENEMENT_HACKATHON (IDHACKATHON), PRIMARY KEY(IDEVENEMENT)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE inscription (CODE INT NOT NULL, IDPARTICIPANT INT NOT NULL, IDHACKATHON INT NOT NULL, DATEINSCRIPTION DATE DEFAULT \'NULL\', DESCRIPTION CHAR(255) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, INDEX FK_INSCRIPTION_PARTICIPANT (IDPARTICIPANT), INDEX FK_INSCRIPTION_HACKATHON (IDHACKATHON), PRIMARY KEY(CODE)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE intervenant (IDINTERVENANT INT AUTO_INCREMENT NOT NULL, NOM CHAR(32) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, PRENOM CHAR(32) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, PRIMARY KEY(IDINTERVENANT)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE intervenir (IDINTERVENANT INT NOT NULL, IDEVENEMENT INT NOT NULL, INDEX FK_INTERVENIR_CONFERENCE (IDEVENEMENT), PRIMARY KEY(IDINTERVENANT, IDEVENEMENT)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE participantatelier (IDPARTICIPANTATELIER INT AUTO_INCREMENT NOT NULL, NOM CHAR(32) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, PRENOM CHAR(32) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, EMAIL CHAR(32) CHARACTER SET utf8mb3 DEFAULT \'NULL\' COLLATE `utf8mb3_general_ci`, PRIMARY KEY(IDPARTICIPANTATELIER)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE participer (IDPARTICIPANTATELIER INT NOT NULL, IDEVENEMENT INT NOT NULL, INDEX FK_PARTICIPER_ATELIER (IDEVENEMENT), PRIMARY KEY(IDPARTICIPANTATELIER, IDEVENEMENT)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE hackathon CHANGE datedebut DATEDEBUT DATE DEFAULT \'NULL\', CHANGE datefin DATEFIN DATE DEFAULT \'NULL\', CHANGE heuredebut HEUREDEBUT TIME DEFAULT \'NULL\', CHANGE heurefin HEUREFIN TIME DEFAULT \'NULL\', CHANGE lieu LIEU CHAR(255) DEFAULT \'NULL\', CHANGE rue RUE CHAR(255) DEFAULT \'NULL\', CHANGE ville VILLE CHAR(255) DEFAULT \'NULL\', CHANGE cp CP CHAR(5) DEFAULT \'NULL\', CHANGE theme THEME CHAR(255) DEFAULT \'NULL\', CHANGE description DESCRIPTION CHAR(255) DEFAULT \'NULL\', CHANGE image IMAGE CHAR(255) DEFAULT \'NULL\', CHANGE datelimite DATELIMITE DATE DEFAULT \'NULL\', CHANGE nbplaces NBPLACES BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE participant CHANGE nom NOM CHAR(32) DEFAULT \'NULL\', CHANGE prenom PRENOM CHAR(32) DEFAULT \'NULL\', CHANGE datenaissance DATENAISSANCE DATE DEFAULT \'NULL\', CHANGE ville VILLE CHAR(64) DEFAULT \'NULL\', CHANGE rue RUE VARCHAR(128) DEFAULT \'NULL\', CHANGE cp CP CHAR(5) DEFAULT \'NULL\', CHANGE email EMAIL CHAR(32) DEFAULT \'NULL\', CHANGE login LOGIN CHAR(32) DEFAULT \'NULL\', CHANGE mdp MDP CHAR(32) DEFAULT \'NULL\'');
    }
}
