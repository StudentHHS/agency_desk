<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180911145407 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE documentation (id INT AUTO_INCREMENT NOT NULL, developer_id INT NOT NULL, subject_id INT NOT NULL, title VARCHAR(100) NOT NULL, active TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, markdown LONGTEXT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_73D5A93B64DD9267 (developer_id), INDEX IDX_73D5A93B23EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documentation_subject (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, active TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contract (id INT AUTO_INCREMENT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE credit__card (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, price NUMERIC(10, 2) DEFAULT NULL, start_credit INT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_135E66669395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, state_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, invoice_nr INT NOT NULL, credit TINYINT(1) NOT NULL, paid TINYINT(1) NOT NULL, reason_free VARCHAR(255) DEFAULT NULL, date DATE NOT NULL, payment_date DATE DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_906517445D83CC1 (state_id), INDEX IDX_906517449395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice_line (id INT AUTO_INCREMENT NOT NULL, invoice_id INT DEFAULT NULL, vat_tariff_id INT DEFAULT NULL, quantity INT NOT NULL, description VARCHAR(255) DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_D3D1D6932989F1FD (invoice_id), INDEX IDX_D3D1D693D44BA274 (vat_tariff_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice_state (id INT AUTO_INCREMENT NOT NULL, state VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, credit_card INT DEFAULT NULL, invoice_id INT DEFAULT NULL, worklog_id INT DEFAULT NULL, amount_credit NUMERIC(10, 2) DEFAULT NULL, amount_debit NUMERIC(10, 2) DEFAULT NULL, description LONGTEXT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_723705D111D627EE (credit_card), INDEX IDX_723705D12989F1FD (invoice_id), INDEX IDX_723705D148A4CA35 (worklog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log__call (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, mac VARCHAR(255) DEFAULT NULL, incoming VARCHAR(255) DEFAULT NULL, outgoing VARCHAR(255) DEFAULT NULL, account VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log__elastalert (id INT AUTO_INCREMENT NOT NULL, json MEDIUMTEXT NOT NULL, rule VARCHAR(255) NOT NULL, status INT NOT NULL, hash TEXT NOT NULL, website VARCHAR(255) NOT NULL, source VARCHAR(255) NOT NULL, host VARCHAR(255) NOT NULL, hits INT NOT NULL, message MEDIUMTEXT NOT NULL, logdate DATETIME NOT NULL, detectdate DATETIME NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log__elastalert_rule (id INT AUTO_INCREMENT NOT NULL, rule VARCHAR(255) NOT NULL, hipchat INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meta__user (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, system_id INT DEFAULT NULL, external_id VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_3FF0100BA76ED395 (user_id), INDEX IDX_3FF0100BD0952FA5 (system_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phonebook__phonebook (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, UNIQUE INDEX UNIQ_26628637989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phonebook__phonerecord (id INT AUTO_INCREMENT NOT NULL, phonebook_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_866A01D71200F70D (phonebook_id), INDEX IDX_866A01D79395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_category (id INT AUTO_INCREMENT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domain (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, product_id INT DEFAULT NULL, state_id INT DEFAULT NULL, country_id INT DEFAULT NULL, domain VARCHAR(255) DEFAULT NULL, department VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, housenumber INT DEFAULT NULL, extension VARCHAR(255) DEFAULT NULL, zipcode VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, contact_email VARCHAR(255) DEFAULT NULL, contact_phone VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_A7A91E0B9395C3F3 (customer_id), INDEX IDX_A7A91E0B4584665A (product_id), INDEX IDX_A7A91E0B5D83CC1 (state_id), INDEX IDX_A7A91E0BF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domain_state (id INT AUTO_INCREMENT NOT NULL, state VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accounts (id INT AUTO_INCREMENT NOT NULL, salt VARCHAR(255) DEFAULT NULL, mysql_url VARCHAR(255) DEFAULT NULL, mysql_user VARCHAR(255) DEFAULT NULL, mysql_password VARCHAR(255) DEFAULT NULL, ftp_url VARCHAR(255) DEFAULT NULL, ftp_user VARCHAR(255) DEFAULT NULL, ftp_password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actual_work (id INT AUTO_INCREMENT NOT NULL, developer INT DEFAULT NULL, credit_card_id INT DEFAULT NULL, invoice_id INT DEFAULT NULL, task INT DEFAULT NULL, begin DATETIME DEFAULT NULL, end DATETIME DEFAULT NULL, INDEX IDX_134C2DBC65FB8B9A (developer), INDEX IDX_134C2DBC7048FD0F (credit_card_id), INDEX IDX_134C2DBC2989F1FD (invoice_id), INDEX IDX_134C2DBC527EDB25 (task), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE checklist (id INT AUTO_INCREMENT NOT NULL, task INT DEFAULT NULL, INDEX IDX_5C696D2F527EDB25 (task), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE checklist_item (id INT AUTO_INCREMENT NOT NULL, checklist INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, INDEX IDX_99EB20F95C696D2F (checklist), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commit (id INT AUTO_INCREMENT NOT NULL, developer INT DEFAULT NULL, task INT DEFAULT NULL, project INT DEFAULT NULL, hash VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, service LONGTEXT NOT NULL, timestamp DATETIME NOT NULL, author LONGTEXT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_4ED42EAD65FB8B9A (developer), INDEX IDX_4ED42EAD527EDB25 (task), INDEX IDX_4ED42EAD2FB3D0EE (project), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE developer_work (id INT AUTO_INCREMENT NOT NULL, actualwork_id INT DEFAULT NULL, developer_id INT DEFAULT NULL, INDEX IDX_E9E15C3374238BA (actualwork_id), INDEX IDX_E9E15C364DD9267 (developer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, user_id INT DEFAULT NULL, account_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, git_url VARCHAR(255) DEFAULT NULL, production_url VARCHAR(255) DEFAULT NULL, development_url VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_2FB3D0EE9395C3F3 (customer_id), INDEX IDX_2FB3D0EEA76ED395 (user_id), INDEX IDX_2FB3D0EE9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE release_candidate (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, scheduled_release_date DATETIME DEFAULT NULL, actual_release_date DATETIME DEFAULT NULL, INDEX IDX_F25CDF51166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scheduled_work (id INT AUTO_INCREMENT NOT NULL, task_id INT DEFAULT NULL, begin DATETIME DEFAULT NULL, end DATETIME DEFAULT NULL, INDEX IDX_9C8F2FA98DB60186 (task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, kanban_order INT NOT NULL, can_start_or_stop INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, style VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, tag_id INT DEFAULT NULL, project INT DEFAULT NULL, priority INT NOT NULL, title VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, estimated_time TIME DEFAULT NULL, approved_date DATETIME DEFAULT NULL, finished_date DATETIME DEFAULT NULL, approved TINYINT(1) DEFAULT NULL, position INT NOT NULL, vivify_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, UNIQUE INDEX UNIQ_527EDB259312DF3B (vivify_id), INDEX IDX_527EDB25BAD26311 (tag_id), INDEX IDX_527EDB252FB3D0EE (project), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link__task__developer (id INT AUTO_INCREMENT NOT NULL, task_id INT DEFAULT NULL, developer_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_EF288DF8DB60186 (task_id), INDEX IDX_EF288DF64DD9267 (developer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, active TINYINT(1) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE external_system (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, active TINYINT(1) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legal_form (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, active TINYINT(1) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vat_tariff (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, tariff INT DEFAULT NULL, active TINYINT(1) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE token (id INT AUTO_INCREMENT NOT NULL, token LONGTEXT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, department VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, housenumber VARCHAR(255) DEFAULT NULL, extension VARCHAR(255) DEFAULT NULL, zipcode VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, contact_email VARCHAR(255) DEFAULT NULL, contact_phone VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_D4E6F81F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, type INT DEFAULT NULL, legal_form_id INT DEFAULT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, sex VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, taxnumber VARCHAR(255) DEFAULT NULL, kvknumber VARCHAR(255) DEFAULT NULL, mobile_phone VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, old_id VARCHAR(255) DEFAULT NULL, vat_number VARCHAR(255) DEFAULT NULL, kvk_number VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, hourly_rate NUMERIC(10, 2) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_81398E098CDE5729 (type), INDEX IDX_81398E0998CD0513 (legal_form_id), INDEX IDX_81398E09A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_address (id INT AUTO_INCREMENT NOT NULL, address_type_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, address_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_1193CB3F9EA97B0B (address_type_id), INDEX IDX_1193CB3F9395C3F3 (customer_id), INDEX IDX_1193CB3FF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_project (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, project_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_336E74509395C3F3 (customer_id), INDEX IDX_336E7450166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE developer (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) DEFAULT NULL, firstname VARCHAR(255) NOT NULL, prefix VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, salt LONGTEXT NOT NULL, password VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link__customer_user (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, user_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_6226F6539395C3F3 (customer_id), INDEX IDX_6226F653A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) DEFAULT NULL, gender ENUM(\'m\', \'f\'), firstname VARCHAR(255) NOT NULL, prefix VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, mobile_phone VARCHAR(255) DEFAULT NULL, salt LONGTEXT NOT NULL, password VARCHAR(255) NOT NULL, newsletter_optin TINYINT(1) NOT NULL, active TINYINT(1) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vault_files (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vault_servers (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, server VARCHAR(255) NOT NULL, user VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, user_da VARCHAR(255) NOT NULL, password_da VARCHAR(255) NOT NULL, user_sql VARCHAR(255) NOT NULL, password_sql VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_119386C99395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documentation ADD CONSTRAINT FK_73D5A93B64DD9267 FOREIGN KEY (developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE documentation ADD CONSTRAINT FK_73D5A93B23EDC87 FOREIGN KEY (subject_id) REFERENCES documentation_subject (id)');
        $this->addSql('ALTER TABLE credit__card ADD CONSTRAINT FK_135E66669395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517445D83CC1 FOREIGN KEY (state_id) REFERENCES invoice_state (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517449395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice_line ADD CONSTRAINT FK_D3D1D6932989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice_line ADD CONSTRAINT FK_D3D1D693D44BA274 FOREIGN KEY (vat_tariff_id) REFERENCES vat_tariff (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D111D627EE FOREIGN KEY (credit_card) REFERENCES credit__card (id) ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D12989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D148A4CA35 FOREIGN KEY (worklog_id) REFERENCES actual_work (id) ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE meta__user ADD CONSTRAINT FK_3FF0100BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meta__user ADD CONSTRAINT FK_3FF0100BD0952FA5 FOREIGN KEY (system_id) REFERENCES external_system (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE phonebook__phonerecord ADD CONSTRAINT FK_866A01D71200F70D FOREIGN KEY (phonebook_id) REFERENCES phonebook__phonebook (id) ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE phonebook__phonerecord ADD CONSTRAINT FK_866A01D79395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0B9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0B4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0B5D83CC1 FOREIGN KEY (state_id) REFERENCES domain_state (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0BF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actual_work ADD CONSTRAINT FK_134C2DBC65FB8B9A FOREIGN KEY (developer) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE actual_work ADD CONSTRAINT FK_134C2DBC7048FD0F FOREIGN KEY (credit_card_id) REFERENCES credit__card (id) ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE actual_work ADD CONSTRAINT FK_134C2DBC2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE actual_work ADD CONSTRAINT FK_134C2DBC527EDB25 FOREIGN KEY (task) REFERENCES task (id)');
        $this->addSql('ALTER TABLE checklist ADD CONSTRAINT FK_5C696D2F527EDB25 FOREIGN KEY (task) REFERENCES task (id)');
        $this->addSql('ALTER TABLE checklist_item ADD CONSTRAINT FK_99EB20F95C696D2F FOREIGN KEY (checklist) REFERENCES checklist (id)');
        $this->addSql('ALTER TABLE commit ADD CONSTRAINT FK_4ED42EAD65FB8B9A FOREIGN KEY (developer) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE commit ADD CONSTRAINT FK_4ED42EAD527EDB25 FOREIGN KEY (task) REFERENCES task (id)');
        $this->addSql('ALTER TABLE commit ADD CONSTRAINT FK_4ED42EAD2FB3D0EE FOREIGN KEY (project) REFERENCES project (id)');
        $this->addSql('ALTER TABLE developer_work ADD CONSTRAINT FK_E9E15C3374238BA FOREIGN KEY (actualwork_id) REFERENCES actual_work (id)');
        $this->addSql('ALTER TABLE developer_work ADD CONSTRAINT FK_E9E15C364DD9267 FOREIGN KEY (developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id)');
        $this->addSql('ALTER TABLE release_candidate ADD CONSTRAINT FK_F25CDF51166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE scheduled_work ADD CONSTRAINT FK_9C8F2FA98DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB252FB3D0EE FOREIGN KEY (project) REFERENCES project (id)');
        $this->addSql('ALTER TABLE link__task__developer ADD CONSTRAINT FK_EF288DF8DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE link__task__developer ADD CONSTRAINT FK_EF288DF64DD9267 FOREIGN KEY (developer_id) REFERENCES developer (id) ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E098CDE5729 FOREIGN KEY (type) REFERENCES address_type (id)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E0998CD0513 FOREIGN KEY (legal_form_id) REFERENCES legal_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE customer_address ADD CONSTRAINT FK_1193CB3F9EA97B0B FOREIGN KEY (address_type_id) REFERENCES address_type (id)');
        $this->addSql('ALTER TABLE customer_address ADD CONSTRAINT FK_1193CB3F9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_address ADD CONSTRAINT FK_1193CB3FF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE customer_project ADD CONSTRAINT FK_336E74509395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_project ADD CONSTRAINT FK_336E7450166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE link__customer_user ADD CONSTRAINT FK_6226F6539395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE link__customer_user ADD CONSTRAINT FK_6226F653A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vault_servers ADD CONSTRAINT FK_119386C99395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documentation DROP FOREIGN KEY FK_73D5A93B23EDC87');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D111D627EE');
        $this->addSql('ALTER TABLE actual_work DROP FOREIGN KEY FK_134C2DBC7048FD0F');
        $this->addSql('ALTER TABLE invoice_line DROP FOREIGN KEY FK_D3D1D6932989F1FD');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D12989F1FD');
        $this->addSql('ALTER TABLE actual_work DROP FOREIGN KEY FK_134C2DBC2989F1FD');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517445D83CC1');
        $this->addSql('ALTER TABLE phonebook__phonerecord DROP FOREIGN KEY FK_866A01D71200F70D');
        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0B5D83CC1');
        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0B4584665A');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9B6B5FBA');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D148A4CA35');
        $this->addSql('ALTER TABLE developer_work DROP FOREIGN KEY FK_E9E15C3374238BA');
        $this->addSql('ALTER TABLE checklist_item DROP FOREIGN KEY FK_99EB20F95C696D2F');
        $this->addSql('ALTER TABLE commit DROP FOREIGN KEY FK_4ED42EAD2FB3D0EE');
        $this->addSql('ALTER TABLE release_candidate DROP FOREIGN KEY FK_F25CDF51166D1F9C');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB252FB3D0EE');
        $this->addSql('ALTER TABLE customer_project DROP FOREIGN KEY FK_336E7450166D1F9C');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25BAD26311');
        $this->addSql('ALTER TABLE actual_work DROP FOREIGN KEY FK_134C2DBC527EDB25');
        $this->addSql('ALTER TABLE checklist DROP FOREIGN KEY FK_5C696D2F527EDB25');
        $this->addSql('ALTER TABLE commit DROP FOREIGN KEY FK_4ED42EAD527EDB25');
        $this->addSql('ALTER TABLE scheduled_work DROP FOREIGN KEY FK_9C8F2FA98DB60186');
        $this->addSql('ALTER TABLE link__task__developer DROP FOREIGN KEY FK_EF288DF8DB60186');
        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0BF92F3E70');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81F92F3E70');
        $this->addSql('ALTER TABLE meta__user DROP FOREIGN KEY FK_3FF0100BD0952FA5');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E0998CD0513');
        $this->addSql('ALTER TABLE invoice_line DROP FOREIGN KEY FK_D3D1D693D44BA274');
        $this->addSql('ALTER TABLE customer_address DROP FOREIGN KEY FK_1193CB3FF5B7AF75');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E098CDE5729');
        $this->addSql('ALTER TABLE customer_address DROP FOREIGN KEY FK_1193CB3F9EA97B0B');
        $this->addSql('ALTER TABLE credit__card DROP FOREIGN KEY FK_135E66669395C3F3');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517449395C3F3');
        $this->addSql('ALTER TABLE phonebook__phonerecord DROP FOREIGN KEY FK_866A01D79395C3F3');
        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0B9395C3F3');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9395C3F3');
        $this->addSql('ALTER TABLE customer_address DROP FOREIGN KEY FK_1193CB3F9395C3F3');
        $this->addSql('ALTER TABLE customer_project DROP FOREIGN KEY FK_336E74509395C3F3');
        $this->addSql('ALTER TABLE link__customer_user DROP FOREIGN KEY FK_6226F6539395C3F3');
        $this->addSql('ALTER TABLE vault_servers DROP FOREIGN KEY FK_119386C99395C3F3');
        $this->addSql('ALTER TABLE documentation DROP FOREIGN KEY FK_73D5A93B64DD9267');
        $this->addSql('ALTER TABLE actual_work DROP FOREIGN KEY FK_134C2DBC65FB8B9A');
        $this->addSql('ALTER TABLE commit DROP FOREIGN KEY FK_4ED42EAD65FB8B9A');
        $this->addSql('ALTER TABLE developer_work DROP FOREIGN KEY FK_E9E15C364DD9267');
        $this->addSql('ALTER TABLE link__task__developer DROP FOREIGN KEY FK_EF288DF64DD9267');
        $this->addSql('ALTER TABLE meta__user DROP FOREIGN KEY FK_3FF0100BA76ED395');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA76ED395');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09A76ED395');
        $this->addSql('ALTER TABLE link__customer_user DROP FOREIGN KEY FK_6226F653A76ED395');
        $this->addSql('DROP TABLE documentation');
        $this->addSql('DROP TABLE documentation_subject');
        $this->addSql('DROP TABLE contract');
        $this->addSql('DROP TABLE credit__card');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_line');
        $this->addSql('DROP TABLE invoice_state');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE log__call');
        $this->addSql('DROP TABLE log__elastalert');
        $this->addSql('DROP TABLE log__elastalert_rule');
        $this->addSql('DROP TABLE meta__user');
        $this->addSql('DROP TABLE phonebook__phonebook');
        $this->addSql('DROP TABLE phonebook__phonerecord');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE domain_state');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE accounts');
        $this->addSql('DROP TABLE actual_work');
        $this->addSql('DROP TABLE checklist');
        $this->addSql('DROP TABLE checklist_item');
        $this->addSql('DROP TABLE commit');
        $this->addSql('DROP TABLE developer_work');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE release_candidate');
        $this->addSql('DROP TABLE scheduled_work');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE link__task__developer');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE external_system'); 
        $this->addSql('DROP TABLE legal_form');
        $this->addSql('DROP TABLE vat_tariff');
        $this->addSql('DROP TABLE token');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE address_type');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE customer_address');
        $this->addSql('DROP TABLE customer_project');
        $this->addSql('DROP TABLE developer');
        $this->addSql('DROP TABLE link__customer_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vault_files');
        $this->addSql('DROP TABLE vault_servers');
    }
}
