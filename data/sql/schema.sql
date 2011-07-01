CREATE TABLE asset_record (id BIGINT AUTO_INCREMENT, year BIGINT, amount BIGINT, organization_id BIGINT, INDEX organization_id_idx (organization_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contact_person (id BIGINT AUTO_INCREMENT, name VARCHAR(255), title VARCHAR(255), email VARCHAR(255), address VARCHAR(255), phone VARCHAR(255), organization_id BIGINT, INDEX organization_id_idx (organization_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE giving_record (id BIGINT AUTO_INCREMENT, year BIGINT, amount BIGINT, organization_id BIGINT, INDEX organization_id_idx (organization_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE grantx (id BIGINT AUTO_INCREMENT, comment LONGTEXT, collector_id BIGINT, reviewer_id BIGINT, organization_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX organization_id_idx (organization_id), INDEX reviewer_id_idx (reviewer_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE member (id BIGINT AUTO_INCREMENT, name VARCHAR(50), email VARCHAR(50), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE organization (id BIGINT AUTO_INCREMENT, engname VARCHAR(255), chnname VARCHAR(255), website VARCHAR(255), status VARCHAR(255) DEFAULT 'To be reviewer', comment LONGTEXT, collector_id BIGINT, reviewer_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX reviewer_id_idx (reviewer_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE asset_record ADD CONSTRAINT asset_record_organization_id_organization_id FOREIGN KEY (organization_id) REFERENCES organization(id);
ALTER TABLE contact_person ADD CONSTRAINT contact_person_organization_id_organization_id FOREIGN KEY (organization_id) REFERENCES organization(id);
ALTER TABLE giving_record ADD CONSTRAINT giving_record_organization_id_organization_id FOREIGN KEY (organization_id) REFERENCES organization(id);
ALTER TABLE grantx ADD CONSTRAINT grantx_reviewer_id_member_id FOREIGN KEY (reviewer_id) REFERENCES member(id);
ALTER TABLE grantx ADD CONSTRAINT grantx_organization_id_organization_id FOREIGN KEY (organization_id) REFERENCES organization(id);
ALTER TABLE organization ADD CONSTRAINT organization_reviewer_id_member_id FOREIGN KEY (reviewer_id) REFERENCES member(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
