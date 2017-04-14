--
-- ?????? ???????????? Devart dbForge Studio for MySQL, ?????? 7.2.58.0
-- ???????? ???????? ????????: http://www.devart.com/ru/dbforge/mysql/studio
-- ???? ???????: 4/14/2017 10:57:46 PM
-- ?????? ???????: 5.7.17-log
-- ?????? ???????: 4.1
--


-- 
-- ?????????? ??????? ??????
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- ?????????? ????? SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- ????????? ???? ?????? ?? ?????????
--
USE winkelor_db;

--
-- ???????? ??? ??????? auth_rule
--
DROP TABLE IF EXISTS auth_rule;
CREATE TABLE auth_rule (
  name VARCHAR(64) NOT NULL,
  data TEXT DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (name)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? migration
--
DROP TABLE IF EXISTS migration;
CREATE TABLE migration (
  version VARCHAR(180) NOT NULL,
  apply_time INT(11) DEFAULT NULL,
  PRIMARY KEY (version)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? usr_accounts_types
--
DROP TABLE IF EXISTS usr_accounts_types;
CREATE TABLE usr_accounts_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description TEXT DEFAULT NULL,
  frontend TINYINT(1) DEFAULT NULL,
  backend TINYINT(1) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? auth_item
--
DROP TABLE IF EXISTS auth_item;
CREATE TABLE auth_item (
  name VARCHAR(64) NOT NULL,
  type INT(11) NOT NULL,
  description TEXT DEFAULT NULL,
  rule_name VARCHAR(64) DEFAULT NULL,
  data TEXT DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (name),
  INDEX `idx-auth_item-type` (type),
  INDEX rule_name (rule_name),
  CONSTRAINT auth_item_ibfk_1 FOREIGN KEY (rule_name)
    REFERENCES auth_rule(name) ON DELETE SET NULL ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? user_admin
--
DROP TABLE IF EXISTS user_admin;
CREATE TABLE user_admin (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  auth_key VARCHAR(32) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  password_reset_token VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) NOT NULL,
  account_type_id INT(11) DEFAULT NULL,
  status SMALLINT(6) NOT NULL DEFAULT 10,
  created_at INT(11) NOT NULL,
  updated_at INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX email (email),
  INDEX idx_user_admin_account_type (account_type_id),
  UNIQUE INDEX password_reset_token (password_reset_token),
  UNIQUE INDEX username (username),
  CONSTRAINT fk_user_admin_account_type FOREIGN KEY (account_type_id)
    REFERENCES usr_accounts_types(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? user_client
--
DROP TABLE IF EXISTS user_client;
CREATE TABLE user_client (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  auth_key VARCHAR(32) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  password_reset_token VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) NOT NULL,
  account_type_id INT(11) DEFAULT NULL,
  status SMALLINT(6) NOT NULL DEFAULT 10,
  created_at INT(11) NOT NULL,
  updated_at INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX email (email),
  INDEX idx_user_client_account_type (account_type_id),
  UNIQUE INDEX password_reset_token (password_reset_token),
  UNIQUE INDEX username (username),
  CONSTRAINT fk_user_client_account_type FOREIGN KEY (account_type_id)
    REFERENCES usr_accounts_types(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 2
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? auth_assignment
--
DROP TABLE IF EXISTS auth_assignment;
CREATE TABLE auth_assignment (
  item_name VARCHAR(64) NOT NULL,
  user_id VARCHAR(64) NOT NULL,
  created_at INT(11) DEFAULT NULL,
  PRIMARY KEY (item_name, user_id),
  CONSTRAINT auth_assignment_ibfk_1 FOREIGN KEY (item_name)
    REFERENCES auth_item(name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? auth_item_child
--
DROP TABLE IF EXISTS auth_item_child;
CREATE TABLE auth_item_child (
  parent VARCHAR(64) NOT NULL,
  child VARCHAR(64) NOT NULL,
  PRIMARY KEY (parent, child),
  INDEX child (child),
  CONSTRAINT auth_item_child_ibfk_1 FOREIGN KEY (parent)
    REFERENCES auth_item(name) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT auth_item_child_ibfk_2 FOREIGN KEY (child)
    REFERENCES auth_item(name) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

-- 
-- ????? ?????? ??? ??????? auth_rule
--

-- ??????? winkelor_db.auth_rule ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? migration
--
INSERT INTO migration VALUES
('m000000_000000_base', 1485082923),
('m140506_102106_rbac_init', 1485086757),
('m170227_134052_usr_accounts_types', 1488206111),
('m170227_134053_user_client', 1488206111),
('m170227_134054_user_admin', 1488206112);

-- 
-- ????? ?????? ??? ??????? usr_accounts_types
--
INSERT INTO usr_accounts_types VALUES
(1, 'winkelor_admin', 'winkelor back office admin', 0, 1),
(2, 'winkelor_manager', 'winkelor back office manager', 0, 1),
(3, 'client_seller', 'it shop', 0, 1),
(4, 'client_customer', 'shopper', 1, 0);

-- 
-- ????? ?????? ??? ??????? auth_item
--
INSERT INTO auth_item VALUES
('admin', 1, NULL, NULL, NULL, 1485088314, 1485088314),
('perm1', 2, NULL, NULL, NULL, 1488194618, 1488194618),
('role', 1, NULL, NULL, NULL, 1488194607, 1488194607),
('root', 2, NULL, NULL, NULL, 1488200392, 1488200392);

-- 
-- ????? ?????? ??? ??????? user_admin
--
INSERT INTO user_admin VALUES
(4, 'root', 'pWahDyXWGLsaQUhaPlzfDBz-wh_2Ce7N', '$2y$13$iJGpLIszeS9161FfeedxH.9IB/N4ArHkxHGjvKmVPLnYx/Pq5pQ4G', NULL, 'antonbeletskyeu@gmail.com', NULL, 10, 1488918829, 1488918829);

-- 
-- ????? ?????? ??? ??????? user_client
--
INSERT INTO user_client VALUES
(1, 'antonbeletskyeu', 'OFRvAfY719VYRdnnd4hOFsk3tijaoVg-', '$2y$13$M.dZWvFu.TMsyBRmu9VbQe.zH7oGfO7B7GeaBuVIbGB3QfWOv0t4u', NULL, 'antonbeletskyeu@gmail.com', NULL, 10, 1488740301, 1488740301);

-- 
-- ????? ?????? ??? ??????? auth_assignment
--
INSERT INTO auth_assignment VALUES
('admin', '1', 1485088314);

-- 
-- ????? ?????? ??? ??????? auth_item_child
--
INSERT INTO auth_item_child VALUES
('role', 'perm1'),
('admin', 'root');

-- 
-- ???????????? ?????????? ????? SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- ????????? ??????? ??????
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;