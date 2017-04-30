--
-- ?????? ???????????? Devart dbForge Studio for MySQL, ?????? 7.2.58.0
-- ???????? ???????? ????????: http://www.devart.com/ru/dbforge/mysql/studio
-- ???? ???????: 4/30/2017 5:40:24 PM
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
-- ???????? ??? ??????? addresses
--
DROP TABLE IF EXISTS addresses;
CREATE TABLE addresses (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  street VARCHAR(255) DEFAULT NULL,
  build VARCHAR(255) DEFAULT NULL,
  apartments VARCHAR(255) DEFAULT NULL,
  city VARCHAR(255) DEFAULT NULL,
  region VARCHAR(255) DEFAULT NULL,
  state VARCHAR(255) DEFAULT NULL,
  post_index VARCHAR(255) DEFAULT NULL,
  country VARCHAR(255) DEFAULT NULL,
  security_access_code VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? attributes_types
--
DROP TABLE IF EXISTS attributes_types;
CREATE TABLE attributes_types (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  db_type VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? auth_rule
--
DROP TABLE IF EXISTS auth_rule;
CREATE TABLE auth_rule (
  name VARCHAR(64) NOT NULL,
  data BLOB DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (name)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? cart_details_status
--
DROP TABLE IF EXISTS cart_details_status;
CREATE TABLE cart_details_status (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? contacts
--
DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  second_phone VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? countries
--
DROP TABLE IF EXISTS countries;
CREATE TABLE countries (
  id INT(11) NOT NULL AUTO_INCREMENT,
  en_name VARCHAR(255) DEFAULT NULL,
  native_name VARCHAR(255) DEFAULT NULL,
  iso_code VARCHAR(255) DEFAULT NULL,
  iso_short VARCHAR(255) DEFAULT NULL,
  iso_long VARCHAR(255) DEFAULT NULL,
  un_code VARCHAR(255) DEFAULT NULL,
  `iso_3166-1_code` VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? global_categories
--
DROP TABLE IF EXISTS global_categories;
CREATE TABLE global_categories (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  parent_id BIGINT(20) DEFAULT NULL,
  level_depth INT(11) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_global_categories__parent (parent_id),
  CONSTRAINT fk_global_categories__parent FOREIGN KEY (parent_id)
    REFERENCES global_categories(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? image_types
--
DROP TABLE IF EXISTS image_types;
CREATE TABLE image_types (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  is_action TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? lang_translate_example
--
DROP TABLE IF EXISTS lang_translate_example;
CREATE TABLE lang_translate_example (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  language_id VARCHAR(255) DEFAULT NULL,
  `key` VARCHAR(255) DEFAULT NULL,
  value VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? languages
--
DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
  id INT(11) NOT NULL AUTO_INCREMENT,
  en_name VARCHAR(255) DEFAULT NULL,
  iso639_1 VARCHAR(255) DEFAULT NULL,
  native_name VARCHAR(255) DEFAULT NULL,
  native_name_short VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
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
AVG_ROW_LENGTH = 188
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? order_statuses
--
DROP TABLE IF EXISTS order_statuses;
CREATE TABLE order_statuses (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? orders_details_status
--
DROP TABLE IF EXISTS orders_details_status;
CREATE TABLE orders_details_status (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? products_attributes_logistics_info_statuses
--
DROP TABLE IF EXISTS products_attributes_logistics_info_statuses;
CREATE TABLE products_attributes_logistics_info_statuses (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shipping_info_status
--
DROP TABLE IF EXISTS shipping_info_status;
CREATE TABLE shipping_info_status (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shop_statuses
--
DROP TABLE IF EXISTS shop_statuses;
CREATE TABLE shop_statuses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shop_types
--
DROP TABLE IF EXISTS shop_types;
CREATE TABLE shop_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shops_departments_statuses
--
DROP TABLE IF EXISTS shops_departments_statuses;
CREATE TABLE shops_departments_statuses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shops_departments_types
--
DROP TABLE IF EXISTS shops_departments_types;
CREATE TABLE shops_departments_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
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
  type SMALLINT(6) NOT NULL,
  description TEXT DEFAULT NULL,
  rule_name VARCHAR(64) DEFAULT NULL,
  data BLOB DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (name),
  INDEX `idx-auth_item-type` (type),
  INDEX rule_name (rule_name),
  CONSTRAINT auth_item_ibfk_1 FOREIGN KEY (rule_name)
    REFERENCES auth_rule(name) ON DELETE SET NULL ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? cultures
--
DROP TABLE IF EXISTS cultures;
CREATE TABLE cultures (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  language_culture_name VARCHAR(255) DEFAULT NULL,
  display_ame VARCHAR(255) DEFAULT NULL,
  culture_code VARCHAR(255) DEFAULT NULL,
  ISO_639x_value VARCHAR(255) DEFAULT NULL,
  language_id INT(11) DEFAULT NULL,
  country_id INT(11) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_cultures__country (country_id),
  INDEX idx_cultures__language (language_id),
  CONSTRAINT fk_cultures__country FOREIGN KEY (country_id)
    REFERENCES countries(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_cultures__language FOREIGN KEY (language_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shipping_info
--
DROP TABLE IF EXISTS shipping_info;
CREATE TABLE shipping_info (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  post_tracker VARCHAR(255) DEFAULT NULL,
  date_start DATETIME DEFAULT NULL,
  date_end DATETIME DEFAULT NULL,
  status_id BIGINT(20) DEFAULT NULL,
  address_id BIGINT(20) DEFAULT NULL,
  contact_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_shipping_info__address (address_id),
  INDEX idx_shipping_info__contact (contact_id),
  INDEX idx_shipping_info__status (status_id),
  CONSTRAINT fk_shipping_info__address FOREIGN KEY (address_id)
    REFERENCES addresses(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shipping_info__contact FOREIGN KEY (contact_id)
    REFERENCES contacts(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shipping_info__status FOREIGN KEY (status_id)
    REFERENCES shipping_info_status(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_addresses
--
DROP TABLE IF EXISTS trans_addresses;
CREATE TABLE trans_addresses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  addresses_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  street VARCHAR(255) DEFAULT NULL,
  build VARCHAR(255) DEFAULT NULL,
  apartments VARCHAR(255) DEFAULT NULL,
  city VARCHAR(255) DEFAULT NULL,
  region VARCHAR(255) DEFAULT NULL,
  state VARCHAR(255) DEFAULT NULL,
  post_index VARCHAR(255) DEFAULT NULL,
  country VARCHAR(255) DEFAULT NULL,
  security_access_code VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_addresses-addresses_id` (addresses_id),
  INDEX `idx-trans_addresses-lang_id` (lang_id),
  CONSTRAINT `fk-trans_addresses-addresses_id` FOREIGN KEY (addresses_id)
    REFERENCES addresses(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_addresses-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_attributes_types
--
DROP TABLE IF EXISTS trans_attributes_types;
CREATE TABLE trans_attributes_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  attributes_types_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  db_type VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_attributes_types-attributes_types_id` (attributes_types_id),
  INDEX `idx-trans_attributes_types-lang_id` (lang_id),
  CONSTRAINT `fk-trans_attributes_types-attributes_types_id` FOREIGN KEY (attributes_types_id)
    REFERENCES attributes_types(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_attributes_types-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_cart_details_status
--
DROP TABLE IF EXISTS trans_cart_details_status;
CREATE TABLE trans_cart_details_status (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  cart_details_status_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_cart_details_status-cart_details_status_id` (cart_details_status_id),
  INDEX `idx-trans_cart_details_status-lang_id` (lang_id),
  CONSTRAINT `fk-trans_cart_details_status-cart_details_status_id` FOREIGN KEY (cart_details_status_id)
    REFERENCES cart_details_status(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_cart_details_status-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_contacts
--
DROP TABLE IF EXISTS trans_contacts;
CREATE TABLE trans_contacts (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  contacts_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  second_phone VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_contacts-contacts_id` (contacts_id),
  INDEX `idx-trans_contacts-lang_id` (lang_id),
  CONSTRAINT `fk-trans_contacts-contacts_id` FOREIGN KEY (contacts_id)
    REFERENCES contacts(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_contacts-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_countries
--
DROP TABLE IF EXISTS trans_countries;
CREATE TABLE trans_countries (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  countries_id INT(11) DEFAULT NULL,
  en_name VARCHAR(255) DEFAULT NULL,
  native_name VARCHAR(255) DEFAULT NULL,
  iso_code VARCHAR(255) DEFAULT NULL,
  iso_short VARCHAR(255) DEFAULT NULL,
  iso_long VARCHAR(255) DEFAULT NULL,
  un_code VARCHAR(255) DEFAULT NULL,
  `iso_3166-1_code` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_countries-countries_id` (countries_id),
  INDEX `idx-trans_countries-lang_id` (lang_id),
  CONSTRAINT `fk-trans_countries-countries_id` FOREIGN KEY (countries_id)
    REFERENCES countries(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_countries-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_global_categories
--
DROP TABLE IF EXISTS trans_global_categories;
CREATE TABLE trans_global_categories (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  global_categories_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_global_categories-global_categories_id` (global_categories_id),
  INDEX `idx-trans_global_categories-lang_id` (lang_id),
  CONSTRAINT `fk-trans_global_categories-global_categories_id` FOREIGN KEY (global_categories_id)
    REFERENCES global_categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_global_categories-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_image_types
--
DROP TABLE IF EXISTS trans_image_types;
CREATE TABLE trans_image_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  image_types_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_image_types-image_types_id` (image_types_id),
  INDEX `idx-trans_image_types-lang_id` (lang_id),
  CONSTRAINT `fk-trans_image_types-image_types_id` FOREIGN KEY (image_types_id)
    REFERENCES image_types(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_image_types-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_order_statuses
--
DROP TABLE IF EXISTS trans_order_statuses;
CREATE TABLE trans_order_statuses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  order_statuses_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_order_statuses-lang_id` (lang_id),
  INDEX `idx-trans_order_statuses-order_statuses_id` (order_statuses_id),
  CONSTRAINT `fk-trans_order_statuses-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_order_statuses-order_statuses_id` FOREIGN KEY (order_statuses_id)
    REFERENCES order_statuses(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_orders_details_status
--
DROP TABLE IF EXISTS trans_orders_details_status;
CREATE TABLE trans_orders_details_status (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  orders_details_status_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_orders_details_status-lang_id` (lang_id),
  INDEX `idx-trans_orders_details_status-orders_details_status_id` (orders_details_status_id),
  CONSTRAINT `fk-trans_orders_details_status-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_orders_details_status-orders_details_status_id` FOREIGN KEY (orders_details_status_id)
    REFERENCES orders_details_status(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_products_attributes_logistics_info_statuses
--
DROP TABLE IF EXISTS trans_products_attributes_logistics_info_statuses;
CREATE TABLE trans_products_attributes_logistics_info_statuses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  products_attributes_logistics_info_statuses_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_prod_att_log_inf_stlng` (lang_id),
  INDEX `idx-trans_prod_att_log_inf_st-prod_att_lis` (products_attributes_logistics_info_statuses_id),
  CONSTRAINT `fk-trans_prod_att_log_inf_stlng` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_prod_att_log_inf_st-prod_att_lis` FOREIGN KEY (products_attributes_logistics_info_statuses_id)
    REFERENCES products_attributes_logistics_info_statuses(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shipping_info_status
--
DROP TABLE IF EXISTS trans_shipping_info_status;
CREATE TABLE trans_shipping_info_status (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shipping_info_status_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shipping_info_status-lang_id` (lang_id),
  INDEX `idx-trans_shipping_info_status-shipping_info_status_id` (shipping_info_status_id),
  CONSTRAINT `fk-trans_shipping_info_status-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shipping_info_status-shipping_info_status_id` FOREIGN KEY (shipping_info_status_id)
    REFERENCES shipping_info_status(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shop_statuses
--
DROP TABLE IF EXISTS trans_shop_statuses;
CREATE TABLE trans_shop_statuses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shop_statuses_id INT(11) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shop_statuses-lang_id` (lang_id),
  INDEX `idx-trans_shop_statuses-shop_statuses_id` (shop_statuses_id),
  CONSTRAINT `fk-trans_shop_statuses-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shop_statuses-shop_statuses_id` FOREIGN KEY (shop_statuses_id)
    REFERENCES shop_statuses(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shop_types
--
DROP TABLE IF EXISTS trans_shop_types;
CREATE TABLE trans_shop_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shop_types_id INT(11) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shop_types-lang_id` (lang_id),
  INDEX `idx-trans_shop_types-shop_types_id` (shop_types_id),
  CONSTRAINT `fk-trans_shop_types-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shop_types-shop_types_id` FOREIGN KEY (shop_types_id)
    REFERENCES shop_types(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shops_departments_statuses
--
DROP TABLE IF EXISTS trans_shops_departments_statuses;
CREATE TABLE trans_shops_departments_statuses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shops_departments_statuses_id INT(11) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shops_dep_statuses` (shops_departments_statuses_id),
  INDEX `idx-trans_shops_departments_statuses-lang_id` (lang_id),
  CONSTRAINT `fk-trans_shops_dep_statuses` FOREIGN KEY (shops_departments_statuses_id)
    REFERENCES shops_departments_statuses(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shops_departments_statuses-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shops_departments_types
--
DROP TABLE IF EXISTS trans_shops_departments_types;
CREATE TABLE trans_shops_departments_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shops_departments_types_id INT(11) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shops_de_tsdep_types` (shops_departments_types_id),
  INDEX `idx-trans_shops_departments_types-lang_id` (lang_id),
  CONSTRAINT `fk-trans_shops_de_tsdep_types` FOREIGN KEY (shops_departments_types_id)
    REFERENCES shops_departments_types(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shops_departments_types-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_usr_accounts_types
--
DROP TABLE IF EXISTS trans_usr_accounts_types;
CREATE TABLE trans_usr_accounts_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  usr_accounts_types_id INT(11) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_usr_accounts_types-lang_id` (lang_id),
  INDEX `idx-trans_usr_accounts_types-usr_accounts_types_id` (usr_accounts_types_id),
  CONSTRAINT `fk-trans_usr_accounts_types-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_usr_accounts_types-usr_accounts_types_id` FOREIGN KEY (usr_accounts_types_id)
    REFERENCES usr_accounts_types(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? user_admin
--
DROP TABLE IF EXISTS user_admin;
CREATE TABLE user_admin (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
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
  INDEX idx_user_admin__account_type (account_type_id),
  UNIQUE INDEX password_reset_token (password_reset_token),
  UNIQUE INDEX username (username),
  CONSTRAINT fk_user_admin__account_type FOREIGN KEY (account_type_id)
    REFERENCES usr_accounts_types(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? user_client
--
DROP TABLE IF EXISTS user_client;
CREATE TABLE user_client (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
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
  INDEX idx_user_client__account_type (account_type_id),
  UNIQUE INDEX password_reset_token (password_reset_token),
  UNIQUE INDEX username (username),
  CONSTRAINT fk_user_client__account_type FOREIGN KEY (account_type_id)
    REFERENCES usr_accounts_types(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
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
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? cart
--
DROP TABLE IF EXISTS cart;
CREATE TABLE cart (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  user_client_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_cart__user_client (user_client_id),
  CONSTRAINT fk_cart__user_client FOREIGN KEY (user_client_id)
    REFERENCES user_client(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shops
--
DROP TABLE IF EXISTS shops;
CREATE TABLE shops (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  short_name VARCHAR(255) DEFAULT NULL,
  main_user_id BIGINT(20) DEFAULT NULL,
  type_id INT(11) DEFAULT NULL,
  status_id INT(11) DEFAULT NULL,
  address_id BIGINT(20) DEFAULT NULL,
  contact_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_shops__address (address_id),
  INDEX idx_shops__contact (contact_id),
  INDEX idx_shops__main_user (main_user_id),
  INDEX idx_shops__status (status_id),
  INDEX idx_shops__type (type_id),
  CONSTRAINT fk_shops__address FOREIGN KEY (address_id)
    REFERENCES addresses(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops__contact FOREIGN KEY (contact_id)
    REFERENCES contacts(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops__main_user FOREIGN KEY (main_user_id)
    REFERENCES user_admin(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops__status FOREIGN KEY (status_id)
    REFERENCES shop_statuses(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops__type FOREIGN KEY (type_id)
    REFERENCES shop_types(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 3
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_cultures
--
DROP TABLE IF EXISTS trans_cultures;
CREATE TABLE trans_cultures (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  cultures_id BIGINT(20) DEFAULT NULL,
  language_culture_name VARCHAR(255) DEFAULT NULL,
  display_ame VARCHAR(255) DEFAULT NULL,
  culture_code VARCHAR(255) DEFAULT NULL,
  ISO_639x_value VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_cultures-cultures_id` (cultures_id),
  INDEX `idx-trans_cultures-lang_id` (lang_id),
  CONSTRAINT `fk-trans_cultures-cultures_id` FOREIGN KEY (cultures_id)
    REFERENCES cultures(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_cultures-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shipping_info
--
DROP TABLE IF EXISTS trans_shipping_info;
CREATE TABLE trans_shipping_info (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shipping_info_id BIGINT(20) DEFAULT NULL,
  post_tracker VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shipping_info-lang_id` (lang_id),
  INDEX `idx-trans_shipping_info-shipping_info_id` (shipping_info_id),
  CONSTRAINT `fk-trans_shipping_info-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shipping_info-shipping_info_id` FOREIGN KEY (shipping_info_id)
    REFERENCES shipping_info(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? wishlist
--
DROP TABLE IF EXISTS wishlist;
CREATE TABLE wishlist (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  public TINYINT(1) DEFAULT NULL,
  user_client_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_wishlist__user_client (user_client_id),
  CONSTRAINT fk_wishlist__user_client FOREIGN KEY (user_client_id)
    REFERENCES user_client(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? currencies
--
DROP TABLE IF EXISTS currencies;
CREATE TABLE currencies (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  short_name VARCHAR(255) DEFAULT NULL,
  is_main TINYINT(1) DEFAULT NULL,
  rate DECIMAL(10, 0) DEFAULT NULL,
  shop_id BIGINT(20) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_currencies__shop (shop_id),
  CONSTRAINT fk_currencies__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? image_info
--
DROP TABLE IF EXISTS image_info;
CREATE TABLE image_info (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  image_type_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  path VARCHAR(255) DEFAULT NULL,
  alternative_path VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_image_info__image_type (image_type_id),
  INDEX idx_image_info__shop (shop_id),
  CONSTRAINT fk_image_info__image_type FOREIGN KEY (image_type_id)
    REFERENCES image_types(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? seo_info
--
DROP TABLE IF EXISTS seo_info;
CREATE TABLE seo_info (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  meta_header VARCHAR(255) DEFAULT NULL,
  meta_description VARCHAR(255) DEFAULT NULL,
  human_readable_url VARCHAR(255) DEFAULT NULL,
  other_seo_info TEXT DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_seo_info__shop (shop_id),
  CONSTRAINT fk_seo_info__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shop_config
--
DROP TABLE IF EXISTS shop_config;
CREATE TABLE shop_config (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  value VARCHAR(255) DEFAULT NULL,
  description TEXT DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_shop_config__shop (shop_id),
  CONSTRAINT fk_shop_config__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shops_cultures
--
DROP TABLE IF EXISTS shops_cultures;
CREATE TABLE shops_cultures (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  culture_id BIGINT(20) DEFAULT NULL,
  is_default TINYINT(1) DEFAULT NULL,
  is_second TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_shops_cultures__culture (culture_id),
  INDEX idx_shops_cultures__shop (shop_id),
  CONSTRAINT fk_shops_cultures__culture FOREIGN KEY (culture_id)
    REFERENCES cultures(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops_cultures__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shops_departments
--
DROP TABLE IF EXISTS shops_departments;
CREATE TABLE shops_departments (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  short_name VARCHAR(255) DEFAULT NULL,
  main_user_id BIGINT(20) DEFAULT NULL,
  type_id INT(11) DEFAULT NULL,
  status_id INT(11) DEFAULT NULL,
  address_id BIGINT(20) DEFAULT NULL,
  contact_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_shops_departments__address (address_id),
  INDEX idx_shops_departments__contact (contact_id),
  INDEX idx_shops_departments__main_user (main_user_id),
  INDEX idx_shops_departments__shop (shop_id),
  INDEX idx_shops_departments__status (status_id),
  INDEX idx_shops_departments__type (type_id),
  CONSTRAINT fk_shops_departments__address FOREIGN KEY (address_id)
    REFERENCES addresses(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops_departments__contact FOREIGN KEY (contact_id)
    REFERENCES contacts(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops_departments__main_user FOREIGN KEY (main_user_id)
    REFERENCES user_admin(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops_departments__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops_departments__status FOREIGN KEY (status_id)
    REFERENCES shops_departments_statuses(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops_departments__type FOREIGN KEY (type_id)
    REFERENCES shops_departments_types(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shops
--
DROP TABLE IF EXISTS trans_shops;
CREATE TABLE trans_shops (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shops_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  short_name VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shops-lang_id` (lang_id),
  INDEX `idx-trans_shops-shops_id` (shops_id),
  CONSTRAINT `fk-trans_shops-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shops-shops_id` FOREIGN KEY (shops_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_wishlist
--
DROP TABLE IF EXISTS trans_wishlist;
CREATE TABLE trans_wishlist (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  wishlist_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_wishlist-lang_id` (lang_id),
  INDEX `idx-trans_wishlist-wishlist_id` (wishlist_id),
  CONSTRAINT `fk-trans_wishlist-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_wishlist-wishlist_id` FOREIGN KEY (wishlist_id)
    REFERENCES wishlist(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? categories
--
DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  global_category_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  parent_id BIGINT(20) DEFAULT NULL,
  level_depth INT(11) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  seo_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_categories__global_category (global_category_id),
  INDEX idx_categories__parent (parent_id),
  INDEX idx_categories__seo (seo_id),
  INDEX idx_categories__shop (shop_id),
  CONSTRAINT fk_categories__global_category FOREIGN KEY (global_category_id)
    REFERENCES global_categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_categories__parent FOREIGN KEY (parent_id)
    REFERENCES categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_categories__seo FOREIGN KEY (seo_id)
    REFERENCES seo_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_categories__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? departments_config
--
DROP TABLE IF EXISTS departments_config;
CREATE TABLE departments_config (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  value VARCHAR(255) DEFAULT NULL,
  description TEXT DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_departments_config__department (department_id),
  INDEX idx_departments_config__shop (shop_id),
  CONSTRAINT fk_departments_config__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_departments_config__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? image_info_global_categories
--
DROP TABLE IF EXISTS image_info_global_categories;
CREATE TABLE image_info_global_categories (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  image_info_id BIGINT(20) DEFAULT NULL,
  global_category_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_image_info_global_categories__global_category (global_category_id),
  INDEX idx_image_info_global_categories__image_info (image_info_id),
  INDEX idx_image_info_global_categories__shop (shop_id),
  CONSTRAINT fk_image_info_global_categories__global_category FOREIGN KEY (global_category_id)
    REFERENCES global_categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info_global_categories__image_info FOREIGN KEY (image_info_id)
    REFERENCES image_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info_global_categories__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? orders
--
DROP TABLE IF EXISTS orders;
CREATE TABLE orders (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  order_user_id VARCHAR(255) DEFAULT NULL,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  total_price DECIMAL(10, 0) DEFAULT NULL,
  currency_id BIGINT(20) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  user_client_id BIGINT(20) DEFAULT NULL,
  shipping_info_id BIGINT(20) DEFAULT NULL,
  status_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_orders__currency (currency_id),
  INDEX idx_orders__department (department_id),
  INDEX idx_orders__shipping_info (shipping_info_id),
  INDEX idx_orders__shop (shop_id),
  INDEX idx_orders__status (status_id),
  INDEX idx_orders__user_client (user_client_id),
  CONSTRAINT fk_orders__currency FOREIGN KEY (currency_id)
    REFERENCES currencies(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders__shipping_info FOREIGN KEY (shipping_info_id)
    REFERENCES shipping_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders__status FOREIGN KEY (status_id)
    REFERENCES order_statuses(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders__user_client FOREIGN KEY (user_client_id)
    REFERENCES user_client(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? shops_commerce_data
--
DROP TABLE IF EXISTS shops_commerce_data;
CREATE TABLE shops_commerce_data (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  value VARCHAR(255) DEFAULT NULL,
  description TEXT DEFAULT NULL,
  text TEXT DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_shops_commerce_data__department (department_id),
  INDEX idx_shops_commerce_data__shop (shop_id),
  CONSTRAINT fk_shops_commerce_data__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_shops_commerce_data__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_currencies
--
DROP TABLE IF EXISTS trans_currencies;
CREATE TABLE trans_currencies (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  currencies_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  short_name VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_currencies-currencies_id` (currencies_id),
  INDEX `idx-trans_currencies-lang_id` (lang_id),
  CONSTRAINT `fk-trans_currencies-currencies_id` FOREIGN KEY (currencies_id)
    REFERENCES currencies(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_currencies-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_image_info
--
DROP TABLE IF EXISTS trans_image_info;
CREATE TABLE trans_image_info (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  image_info_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  path VARCHAR(255) DEFAULT NULL,
  alternative_path VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_image_info-image_info_id` (image_info_id),
  INDEX `idx-trans_image_info-lang_id` (lang_id),
  CONSTRAINT `fk-trans_image_info-image_info_id` FOREIGN KEY (image_info_id)
    REFERENCES image_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_image_info-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_seo_info
--
DROP TABLE IF EXISTS trans_seo_info;
CREATE TABLE trans_seo_info (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  seo_info_id BIGINT(20) DEFAULT NULL,
  meta_header VARCHAR(255) DEFAULT NULL,
  meta_description VARCHAR(255) DEFAULT NULL,
  human_readable_url VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_seo_info-lang_id` (lang_id),
  INDEX `idx-trans_seo_info-seo_info_id` (seo_info_id),
  CONSTRAINT `fk-trans_seo_info-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_seo_info-seo_info_id` FOREIGN KEY (seo_info_id)
    REFERENCES seo_info(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shops_departments
--
DROP TABLE IF EXISTS trans_shops_departments;
CREATE TABLE trans_shops_departments (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shops_departments_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  short_name VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shops_departments-lang_id` (lang_id),
  INDEX `idx-trans_shops_departments-shops_departments_id` (shops_departments_id),
  CONSTRAINT `fk-trans_shops_departments-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shops_departments-shops_departments_id` FOREIGN KEY (shops_departments_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? attributes_groups
--
DROP TABLE IF EXISTS attributes_groups;
CREATE TABLE attributes_groups (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  category_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  rank INT(11) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_attributes_groups__category (category_id),
  INDEX idx_attributes_groups__shop (shop_id),
  CONSTRAINT fk_attributes_groups__category FOREIGN KEY (category_id)
    REFERENCES categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_groups__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? image_info_categories
--
DROP TABLE IF EXISTS image_info_categories;
CREATE TABLE image_info_categories (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  image_info_id BIGINT(20) DEFAULT NULL,
  category_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_image_info_categories__category (category_id),
  INDEX idx_image_info_categories__image_info (image_info_id),
  INDEX idx_image_info_categories__shop (shop_id),
  CONSTRAINT fk_image_info_categories__category FOREIGN KEY (category_id)
    REFERENCES categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info_categories__image_info FOREIGN KEY (image_info_id)
    REFERENCES image_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info_categories__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? order_comments
--
DROP TABLE IF EXISTS order_comments;
CREATE TABLE order_comments (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  order_id BIGINT(20) DEFAULT NULL,
  manager_id BIGINT(20) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_order_comments__department (department_id),
  INDEX idx_order_comments__manager (manager_id),
  INDEX idx_order_comments__order (order_id),
  INDEX idx_order_comments__shop (shop_id),
  CONSTRAINT fk_order_comments__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_order_comments__manager FOREIGN KEY (manager_id)
    REFERENCES user_admin(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_order_comments__order FOREIGN KEY (order_id)
    REFERENCES orders(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_order_comments__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? products
--
DROP TABLE IF EXISTS products;
CREATE TABLE products (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  category_id BIGINT(20) DEFAULT NULL,
  vendor_code VARCHAR(255) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  short_description VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  purchase_price DECIMAL(10, 0) DEFAULT NULL,
  selling_price DECIMAL(10, 0) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  seo_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_products__category (category_id),
  INDEX idx_products__department (department_id),
  INDEX idx_products__seo (seo_id),
  INDEX idx_products__shop (shop_id),
  CONSTRAINT fk_products__category FOREIGN KEY (category_id)
    REFERENCES categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_products__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_products__seo FOREIGN KEY (seo_id)
    REFERENCES seo_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_products__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_categories
--
DROP TABLE IF EXISTS trans_categories;
CREATE TABLE trans_categories (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  categories_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_categories-categories_id` (categories_id),
  INDEX `idx-trans_categories-lang_id` (lang_id),
  CONSTRAINT `fk-trans_categories-categories_id` FOREIGN KEY (categories_id)
    REFERENCES categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_categories-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_orders
--
DROP TABLE IF EXISTS trans_orders;
CREATE TABLE trans_orders (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  orders_id BIGINT(20) DEFAULT NULL,
  order_user_id VARCHAR(255) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_orders-lang_id` (lang_id),
  INDEX `idx-trans_orders-orders_id` (orders_id),
  CONSTRAINT `fk-trans_orders-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_orders-orders_id` FOREIGN KEY (orders_id)
    REFERENCES orders(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_shops_commerce_data
--
DROP TABLE IF EXISTS trans_shops_commerce_data;
CREATE TABLE trans_shops_commerce_data (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  shops_commerce_data_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  value VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_shops_commerce_data-lang_id` (lang_id),
  INDEX `idx-trans_shops_commerce_data-shops_commerce_data_id` (shops_commerce_data_id),
  CONSTRAINT `fk-trans_shops_commerce_data-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_shops_commerce_data-shops_commerce_data_id` FOREIGN KEY (shops_commerce_data_id)
    REFERENCES shops_commerce_data(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? attributes_categories
--
DROP TABLE IF EXISTS attributes_categories;
CREATE TABLE attributes_categories (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  category_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  rank INT(11) DEFAULT NULL,
  attribute_type_id BIGINT(20) DEFAULT NULL,
  attribute_group_id BIGINT(20) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_attributes_categories__attribute_group (attribute_group_id),
  INDEX idx_attributes_categories__attribute_type (attribute_type_id),
  INDEX idx_attributes_categories__category (category_id),
  INDEX idx_attributes_categories__shop (shop_id),
  CONSTRAINT fk_attributes_categories__attribute_group FOREIGN KEY (attribute_group_id)
    REFERENCES attributes_groups(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_categories__attribute_type FOREIGN KEY (attribute_type_id)
    REFERENCES attributes_types(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_categories__category FOREIGN KEY (category_id)
    REFERENCES categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_categories__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? attributes_products
--
DROP TABLE IF EXISTS attributes_products;
CREATE TABLE attributes_products (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  product_id BIGINT(20) DEFAULT NULL,
  value VARCHAR(255) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_attributes_products__department (department_id),
  INDEX idx_attributes_products__product (product_id),
  INDEX idx_attributes_products__shop (shop_id),
  CONSTRAINT fk_attributes_products__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_products__product FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_products__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? image_info_products
--
DROP TABLE IF EXISTS image_info_products;
CREATE TABLE image_info_products (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  image_info_id BIGINT(20) DEFAULT NULL,
  product_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_image_info_products__image_info (image_info_id),
  INDEX idx_image_info_products__product (product_id),
  INDEX idx_image_info_products__shop (shop_id),
  CONSTRAINT fk_image_info_products__image_info FOREIGN KEY (image_info_id)
    REFERENCES image_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info_products__product FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info_products__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? product_status
--
DROP TABLE IF EXISTS product_status;
CREATE TABLE product_status (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  product_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  is_action TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_product_status__department (department_id),
  INDEX idx_product_status__product (product_id),
  INDEX idx_product_status__shop (shop_id),
  CONSTRAINT fk_product_status__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_product_status__product FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_product_status__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? products_attributes_logistics_info
--
DROP TABLE IF EXISTS products_attributes_logistics_info;
CREATE TABLE products_attributes_logistics_info (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  product_id BIGINT(20) DEFAULT NULL,
  purchase_price DECIMAL(10, 0) DEFAULT NULL,
  selling_price DECIMAL(10, 0) DEFAULT NULL,
  count INT(11) DEFAULT NULL,
  status_id BIGINT(20) DEFAULT NULL,
  is_action TINYINT(1) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_products_attributes_logistics_info__department (department_id),
  INDEX idx_products_attributes_logistics_info__product (product_id),
  INDEX idx_products_attributes_logistics_info__shop (shop_id),
  INDEX idx_products_attributes_logistics_info__status (status_id),
  CONSTRAINT fk_products_attributes_logistics_info__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_products_attributes_logistics_info__product FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_products_attributes_logistics_info__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_products_attributes_logistics_info__status FOREIGN KEY (status_id)
    REFERENCES products_attributes_logistics_info_statuses(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_attributes_groups
--
DROP TABLE IF EXISTS trans_attributes_groups;
CREATE TABLE trans_attributes_groups (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  attributes_groups_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_attributes_groups-attributes_groups_id` (attributes_groups_id),
  INDEX `idx-trans_attributes_groups-lang_id` (lang_id),
  CONSTRAINT `fk-trans_attributes_groups-attributes_groups_id` FOREIGN KEY (attributes_groups_id)
    REFERENCES attributes_groups(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_attributes_groups-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_order_comments
--
DROP TABLE IF EXISTS trans_order_comments;
CREATE TABLE trans_order_comments (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  order_comments_id BIGINT(20) DEFAULT NULL,
  comment VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_order_comments-lang_id` (lang_id),
  INDEX `idx-trans_order_comments-order_comments_id` (order_comments_id),
  CONSTRAINT `fk-trans_order_comments-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_order_comments-order_comments_id` FOREIGN KEY (order_comments_id)
    REFERENCES order_comments(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_products
--
DROP TABLE IF EXISTS trans_products;
CREATE TABLE trans_products (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  products_id BIGINT(20) DEFAULT NULL,
  vendor_code VARCHAR(255) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  short_description VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_products-lang_id` (lang_id),
  INDEX `idx-trans_products-products_id` (products_id),
  CONSTRAINT `fk-trans_products-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_products-products_id` FOREIGN KEY (products_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? attributes_products_group
--
DROP TABLE IF EXISTS attributes_products_group;
CREATE TABLE attributes_products_group (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  product_id BIGINT(20) DEFAULT NULL,
  products_attributes_logistics_inf_id BIGINT(20) DEFAULT NULL,
  attribute_product_id BIGINT(20) DEFAULT NULL,
  attribute_category_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_attributes_products_group__attribute_category (attribute_category_id),
  INDEX idx_attributes_products_group__attribute_product (attribute_product_id),
  INDEX idx_attributes_products_group__department (department_id),
  INDEX idx_attributes_products_group__product (product_id),
  INDEX idx_attributes_products_group__products_attributes_logistics_inf (products_attributes_logistics_inf_id),
  INDEX idx_attributes_products_group__shop (shop_id),
  CONSTRAINT fk_attributes_products_group__attribute_category FOREIGN KEY (attribute_category_id)
    REFERENCES attributes_categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_products_group__attribute_product FOREIGN KEY (attribute_product_id)
    REFERENCES attributes_products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_products_group__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_products_group__product FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_products_group__products_attributes_logistics_inf FOREIGN KEY (products_attributes_logistics_inf_id)
    REFERENCES products_attributes_logistics_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_attributes_products_group__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? image_info_attributes_products
--
DROP TABLE IF EXISTS image_info_attributes_products;
CREATE TABLE image_info_attributes_products (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  image_info_id BIGINT(20) DEFAULT NULL,
  attribute_product_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_image_info_attributes_products__attribute_product (attribute_product_id),
  INDEX idx_image_info_attributes_products__image_info (image_info_id),
  INDEX idx_image_info_attributes_products__shop (shop_id),
  CONSTRAINT fk_image_info_attributes_products__attribute_product FOREIGN KEY (attribute_product_id)
    REFERENCES attributes_products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info_attributes_products__image_info FOREIGN KEY (image_info_id)
    REFERENCES image_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_image_info_attributes_products__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_attributes_categories
--
DROP TABLE IF EXISTS trans_attributes_categories;
CREATE TABLE trans_attributes_categories (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  attributes_categories_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_attributes_categories-attributes_categories_id` (attributes_categories_id),
  INDEX `idx-trans_attributes_categories-lang_id` (lang_id),
  CONSTRAINT `fk-trans_attributes_categories-attributes_categories_id` FOREIGN KEY (attributes_categories_id)
    REFERENCES attributes_categories(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_attributes_categories-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_attributes_products
--
DROP TABLE IF EXISTS trans_attributes_products;
CREATE TABLE trans_attributes_products (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  attributes_products_id BIGINT(20) DEFAULT NULL,
  value VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_attributes_products-attributes_products_id` (attributes_products_id),
  INDEX `idx-trans_attributes_products-lang_id` (lang_id),
  CONSTRAINT `fk-trans_attributes_products-attributes_products_id` FOREIGN KEY (attributes_products_id)
    REFERENCES attributes_products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_attributes_products-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? trans_product_status
--
DROP TABLE IF EXISTS trans_product_status;
CREATE TABLE trans_product_status (
  id INT(11) NOT NULL AUTO_INCREMENT,
  lang_id INT(11) NOT NULL,
  product_status_id BIGINT(20) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX `idx-trans_product_status-lang_id` (lang_id),
  INDEX `idx-trans_product_status-product_status_id` (product_status_id),
  CONSTRAINT `fk-trans_product_status-lang_id` FOREIGN KEY (lang_id)
    REFERENCES languages(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-trans_product_status-product_status_id` FOREIGN KEY (product_status_id)
    REFERENCES product_status(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? cart_details
--
DROP TABLE IF EXISTS cart_details;
CREATE TABLE cart_details (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  product_id BIGINT(20) DEFAULT NULL,
  products_attributes_logistics_info_id BIGINT(20) DEFAULT NULL,
  attributes_products_group_id BIGINT(20) DEFAULT NULL,
  cart_id BIGINT(20) DEFAULT NULL,
  count INT(11) DEFAULT NULL,
  status_id BIGINT(20) DEFAULT NULL,
  user_client_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_cart_details__attributes_products_group (attributes_products_group_id),
  INDEX idx_cart_details__cart (cart_id),
  INDEX idx_cart_details__department (department_id),
  INDEX idx_cart_details__product (product_id),
  INDEX idx_cart_details__products_attributes_logistics_info (products_attributes_logistics_info_id),
  INDEX idx_cart_details__shop (shop_id),
  INDEX idx_cart_details__status (status_id),
  INDEX idx_cart_details__user_client (user_client_id),
  CONSTRAINT fk_cart_details__attributes_products_group FOREIGN KEY (attributes_products_group_id)
    REFERENCES attributes_products_group(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_cart_details__cart FOREIGN KEY (cart_id)
    REFERENCES attributes_products_group(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_cart_details__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_cart_details__product FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_cart_details__products_attributes_logistics_info FOREIGN KEY (products_attributes_logistics_info_id)
    REFERENCES products_attributes_logistics_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_cart_details__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_cart_details__status FOREIGN KEY (status_id)
    REFERENCES cart_details_status(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_cart_details__user_client FOREIGN KEY (user_client_id)
    REFERENCES user_client(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? orders_details
--
DROP TABLE IF EXISTS orders_details;
CREATE TABLE orders_details (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  product_id BIGINT(20) DEFAULT NULL,
  products_attributes_logistics_info_id BIGINT(20) DEFAULT NULL,
  attributes_products_group_id BIGINT(20) DEFAULT NULL,
  order_id BIGINT(20) DEFAULT NULL,
  price DECIMAL(10, 0) DEFAULT NULL,
  currency_id BIGINT(20) DEFAULT NULL,
  count INT(11) DEFAULT NULL,
  status_id BIGINT(20) DEFAULT NULL,
  user_client_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_orders_details__attributes_products_group (attributes_products_group_id),
  INDEX idx_orders_details__currency (currency_id),
  INDEX idx_orders_details__department (department_id),
  INDEX idx_orders_details__order (order_id),
  INDEX idx_orders_details__product (product_id),
  INDEX idx_orders_details__products_attributes_logistics_info (products_attributes_logistics_info_id),
  INDEX idx_orders_details__shop (shop_id),
  INDEX idx_orders_details__status (status_id),
  INDEX idx_orders_details__user_client (user_client_id),
  CONSTRAINT fk_orders_details__attributes_products_group FOREIGN KEY (attributes_products_group_id)
    REFERENCES attributes_products_group(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders_details__currency FOREIGN KEY (currency_id)
    REFERENCES currencies(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders_details__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders_details__order FOREIGN KEY (order_id)
    REFERENCES orders_details(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders_details__product FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders_details__products_attributes_logistics_info FOREIGN KEY (products_attributes_logistics_info_id)
    REFERENCES products_attributes_logistics_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders_details__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders_details__status FOREIGN KEY (status_id)
    REFERENCES orders_details_status(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_orders_details__user_client FOREIGN KEY (user_client_id)
    REFERENCES user_client(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- ???????? ??? ??????? wishlist_details
--
DROP TABLE IF EXISTS wishlist_details;
CREATE TABLE wishlist_details (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  shop_id BIGINT(20) DEFAULT NULL,
  department_id BIGINT(20) DEFAULT NULL,
  product_id BIGINT(20) DEFAULT NULL,
  products_attributes_logistics_info_id BIGINT(20) DEFAULT NULL,
  attributes_products_group_id BIGINT(20) DEFAULT NULL,
  wishlist_id BIGINT(20) DEFAULT NULL,
  count INT(11) DEFAULT NULL,
  user_client_id BIGINT(20) DEFAULT NULL,
  created_at INT(11) DEFAULT NULL,
  updated_at INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX idx_wishlist_details__attributes_products_group (attributes_products_group_id),
  INDEX idx_wishlist_details__department (department_id),
  INDEX idx_wishlist_details__product (product_id),
  INDEX idx_wishlist_details__products_attributes_logistics_info (products_attributes_logistics_info_id),
  INDEX idx_wishlist_details__shop (shop_id),
  INDEX idx_wishlist_details__user_client (user_client_id),
  INDEX idx_wishlist_details__wishlist (wishlist_id),
  CONSTRAINT fk_wishlist_details__attributes_products_group FOREIGN KEY (attributes_products_group_id)
    REFERENCES attributes_products_group(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_wishlist_details__department FOREIGN KEY (department_id)
    REFERENCES shops_departments(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_wishlist_details__product FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_wishlist_details__products_attributes_logistics_info FOREIGN KEY (products_attributes_logistics_info_id)
    REFERENCES products_attributes_logistics_info(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_wishlist_details__shop FOREIGN KEY (shop_id)
    REFERENCES shops(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_wishlist_details__user_client FOREIGN KEY (user_client_id)
    REFERENCES user_client(id) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT fk_wishlist_details__wishlist FOREIGN KEY (wishlist_id)
    REFERENCES wishlist(id) ON DELETE CASCADE ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

-- 
-- ????? ?????? ??? ??????? addresses
--

-- ??????? winkelor_db.addresses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? attributes_types
--

-- ??????? winkelor_db.attributes_types ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? auth_rule
--

-- ??????? winkelor_db.auth_rule ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? cart_details_status
--

-- ??????? winkelor_db.cart_details_status ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? contacts
--

-- ??????? winkelor_db.contacts ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? countries
--

-- ??????? winkelor_db.countries ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? global_categories
--

-- ??????? winkelor_db.global_categories ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? image_types
--

-- ??????? winkelor_db.image_types ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? lang_translate_example
--

-- ??????? winkelor_db.lang_translate_example ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? languages
--

-- ??????? winkelor_db.languages ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? migration
--
INSERT INTO migration VALUES
('m000000_000000_base', 1493388852),
('m140506_102106_rbac_init', 1493388854),
('m170227_134052_usr_accounts_types', 1493388863),
('m170227_134053_user_client', 1493388863),
('m170227_134054_user_admin', 1493388864),
('m170305_140815_shop_types', 1493388864),
('m170305_140816_shop_statuses', 1493388864),
('m170305_140818_shops', 1493388864),
('m170305_140818_shops_departments_statuses', 1493388864),
('m170305_140818_shops_departments_types', 1493388864),
('m170305_140818_shop_departments', 1493388864),
('m170305_140901_seo_info', 1493388864),
('m170305_140930_departments_config', 1493388864),
('m170305_140930_shops_config', 1493388864),
('m170305_140955_shops_commerce_data', 1493388864),
('m170305_150040_global_categories', 1493388864),
('m170305_152041_categories', 1493388865),
('m170305_152112_products', 1493388865),
('m170305_152144_attributes_types', 1493388865),
('m170305_152145_attributes_groups', 1493388865),
('m170305_152312_attributes_categories', 1493388865),
('m170305_152344_attributes_products', 1493388865),
('m170309_135613_products_attributes_logistics_info', 1493388865),
('m170309_135615_attributes_products_group', 1493388865),
('m170310_222245_product_status', 1493388865),
('m170311_140635_addresses', 1493388865),
('m170311_140712_contacts', 1493388865),
('m170312_132021_image_types', 1493388865),
('m170312_132047_image_info', 1493388865),
('m170312_142952_image_info_global_categories', 1493388865),
('m170312_143004_image_info_categories', 1493388865),
('m170312_143014_image_info_products', 1493388865),
('m170312_143026_image_info_attributes_products', 1493388865),
('m170317_005102_wishlist', 1493388865),
('m170317_005127_orders', 1493388865),
('m170317_005141_cart', 1493388866),
('m170317_005203_wishlist_details', 1493388866),
('m170317_005212_orders_details', 1493388866),
('m170317_005223_cart_details', 1493388866),
('m170317_130207_order_statuses', 1493388866),
('m170317_130251_shipping_info', 1493388866),
('m170326_120957_countries', 1493388866),
('m170326_121012_languages', 1493388866),
('m170326_121306_lang_translate_example', 1493388866),
('m170408_161022_cultures', 1493388866),
('m170410_123909_order_comments', 1493388866),
('m170410_123909_products_attributes_logistics_info_statuses', 1493388866),
('m170422_220742_cart_details_status', 1493388866),
('m170422_220805_orders_details_status', 1493388866),
('m170422_220835_shipping_info_status', 1493388866),
('m170423_123502_currencies', 1493388866),
('m170424_085325_shops_cultures', 1493388866),
('m170427_000000_foreign_keys_for_shops', 1493388882),
('m170429_162651_create_trans_addresses_table', 1493485526),
('m170429_162654_create_trans_attributes_categories_table', 1493485527),
('m170429_162655_create_trans_attributes_groups_table', 1493485527),
('m170429_162657_create_trans_attributes_products_table', 1493485527),
('m170429_162705_create_trans_attributes_types_table', 1493485528),
('m170429_162712_create_trans_cart_details_status_table', 1493485528),
('m170429_162713_create_trans_categories_table', 1493485528),
('m170429_162715_create_trans_contacts_table', 1493485529),
('m170429_162716_create_trans_countries_table', 1493485529),
('m170429_162718_create_trans_cultures_table', 1493485530),
('m170429_162720_create_trans_currencies_table', 1493485530),
('m170429_162724_create_trans_global_categories_table', 1493485530),
('m170429_162725_create_trans_image_info_table', 1493485531),
('m170429_162727_create_trans_image_types_table', 1493485531),
('m170429_162732_create_trans_order_comments_table', 1493485531),
('m170429_162733_create_trans_order_statuses_table', 1493485532),
('m170429_162735_create_trans_orders_table', 1493485532),
('m170429_162737_create_trans_orders_details_status_table', 1493485533),
('m170429_162738_create_trans_product_status_table', 1493485533),
('m170429_162740_create_trans_products_table', 1493485533),
('m170429_162741_create_trans_products_attributes_logistics_info_statuses_table', 1493485534),
('m170429_162742_create_trans_seo_info_table', 1493485534),
('m170429_162744_create_trans_shipping_info_table', 1493485534),
('m170429_162745_create_trans_shipping_info_status_table', 1493485535),
('m170429_162747_create_trans_shop_statuses_table', 1493485535),
('m170429_162749_create_trans_shop_types_table', 1493485536),
('m170429_162750_create_trans_shops_table', 1493485536),
('m170429_162751_create_trans_shops_commerce_data_table', 1493485537),
('m170429_162753_create_trans_shops_departments_table', 1493485537),
('m170429_162754_create_trans_shops_departments_statuses_table', 1493485538),
('m170429_162755_create_trans_shops_departments_types_table', 1493485538),
('m170429_162757_create_trans_trans_addresses_table', 1493485539),
('m170429_162803_create_trans_usr_accounts_types_table', 1493485703),
('m170429_162805_create_trans_wishlist_table', 1493485703);

-- 
-- ????? ?????? ??? ??????? order_statuses
--

-- ??????? winkelor_db.order_statuses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? orders_details_status
--

-- ??????? winkelor_db.orders_details_status ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? products_attributes_logistics_info_statuses
--

-- ??????? winkelor_db.products_attributes_logistics_info_statuses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shipping_info_status
--

-- ??????? winkelor_db.shipping_info_status ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shop_statuses
--

-- ??????? winkelor_db.shop_statuses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shop_types
--

-- ??????? winkelor_db.shop_types ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shops_departments_statuses
--

-- ??????? winkelor_db.shops_departments_statuses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shops_departments_types
--

-- ??????? winkelor_db.shops_departments_types ?? ???????? ??????

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
('dfdf', 1, NULL, NULL, NULL, 1493473197, 1493473197),
('dfdfff', 2, NULL, NULL, NULL, 1493473200, 1493473200),
('perm1', 2, NULL, NULL, NULL, 1493473074, 1493473074),
('rol1', 1, NULL, NULL, NULL, 1493473068, 1493473369);

-- 
-- ????? ?????? ??? ??????? cultures
--

-- ??????? winkelor_db.cultures ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shipping_info
--

-- ??????? winkelor_db.shipping_info ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_addresses
--

-- ??????? winkelor_db.trans_addresses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_attributes_types
--

-- ??????? winkelor_db.trans_attributes_types ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_cart_details_status
--

-- ??????? winkelor_db.trans_cart_details_status ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_contacts
--

-- ??????? winkelor_db.trans_contacts ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_countries
--

-- ??????? winkelor_db.trans_countries ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_global_categories
--

-- ??????? winkelor_db.trans_global_categories ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_image_types
--

-- ??????? winkelor_db.trans_image_types ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_order_statuses
--

-- ??????? winkelor_db.trans_order_statuses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_orders_details_status
--

-- ??????? winkelor_db.trans_orders_details_status ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_products_attributes_logistics_info_statuses
--

-- ??????? winkelor_db.trans_products_attributes_logistics_info_statuses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shipping_info_status
--

-- ??????? winkelor_db.trans_shipping_info_status ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shop_statuses
--

-- ??????? winkelor_db.trans_shop_statuses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shop_types
--

-- ??????? winkelor_db.trans_shop_types ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shops_departments_statuses
--

-- ??????? winkelor_db.trans_shops_departments_statuses ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shops_departments_types
--

-- ??????? winkelor_db.trans_shops_departments_types ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_usr_accounts_types
--

-- ??????? winkelor_db.trans_usr_accounts_types ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? user_admin
--
INSERT INTO user_admin VALUES
(1, 'AntonBeletsky', 'qwgQyH5jELwSL9sKpMk0lWqRs1oavQuj', '$2y$13$aDmFmaz50VCvA0bhnVmHZubqN0Xjqev6qoM23i3OZO9mpBmJkety.', NULL, 'antonbeletskyeu@gmail.com', NULL, 10, 0, 0),
(2, 'root@gmail.com', 'VXDfaQWpfVvxXqRTPiyfL1XcYzt3q-Oe', '$2y$13$rUtEcI1Mtlx6Uo1u6z0ocuhRHloiuhTtN0jpQSSzsnuJdYP8YhmKe', NULL, 'root@gmail.com', NULL, 10, 1493401121, 1493401121);

-- 
-- ????? ?????? ??? ??????? user_client
--

-- ??????? winkelor_db.user_client ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? auth_assignment
--

-- ??????? winkelor_db.auth_assignment ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? auth_item_child
--
INSERT INTO auth_item_child VALUES
('rol1', 'dfdf'),
('dfdf', 'dfdfff'),
('rol1', 'dfdfff'),
('dfdf', 'perm1'),
('rol1', 'perm1');

-- 
-- ????? ?????? ??? ??????? cart
--

-- ??????? winkelor_db.cart ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shops
--

-- ??????? winkelor_db.shops ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_cultures
--

-- ??????? winkelor_db.trans_cultures ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shipping_info
--

-- ??????? winkelor_db.trans_shipping_info ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? wishlist
--

-- ??????? winkelor_db.wishlist ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? currencies
--

-- ??????? winkelor_db.currencies ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? image_info
--

-- ??????? winkelor_db.image_info ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? seo_info
--

-- ??????? winkelor_db.seo_info ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shop_config
--

-- ??????? winkelor_db.shop_config ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shops_cultures
--

-- ??????? winkelor_db.shops_cultures ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shops_departments
--

-- ??????? winkelor_db.shops_departments ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shops
--

-- ??????? winkelor_db.trans_shops ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_wishlist
--

-- ??????? winkelor_db.trans_wishlist ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? categories
--

-- ??????? winkelor_db.categories ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? departments_config
--

-- ??????? winkelor_db.departments_config ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? image_info_global_categories
--

-- ??????? winkelor_db.image_info_global_categories ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? orders
--

-- ??????? winkelor_db.orders ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? shops_commerce_data
--

-- ??????? winkelor_db.shops_commerce_data ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_currencies
--

-- ??????? winkelor_db.trans_currencies ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_image_info
--

-- ??????? winkelor_db.trans_image_info ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_seo_info
--

-- ??????? winkelor_db.trans_seo_info ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shops_departments
--

-- ??????? winkelor_db.trans_shops_departments ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? attributes_groups
--

-- ??????? winkelor_db.attributes_groups ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? image_info_categories
--

-- ??????? winkelor_db.image_info_categories ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? order_comments
--

-- ??????? winkelor_db.order_comments ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? products
--

-- ??????? winkelor_db.products ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_categories
--

-- ??????? winkelor_db.trans_categories ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_orders
--

-- ??????? winkelor_db.trans_orders ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_shops_commerce_data
--

-- ??????? winkelor_db.trans_shops_commerce_data ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? attributes_categories
--

-- ??????? winkelor_db.attributes_categories ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? attributes_products
--

-- ??????? winkelor_db.attributes_products ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? image_info_products
--

-- ??????? winkelor_db.image_info_products ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? product_status
--

-- ??????? winkelor_db.product_status ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? products_attributes_logistics_info
--

-- ??????? winkelor_db.products_attributes_logistics_info ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_attributes_groups
--

-- ??????? winkelor_db.trans_attributes_groups ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_order_comments
--

-- ??????? winkelor_db.trans_order_comments ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_products
--

-- ??????? winkelor_db.trans_products ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? attributes_products_group
--

-- ??????? winkelor_db.attributes_products_group ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? image_info_attributes_products
--

-- ??????? winkelor_db.image_info_attributes_products ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_attributes_categories
--

-- ??????? winkelor_db.trans_attributes_categories ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_attributes_products
--

-- ??????? winkelor_db.trans_attributes_products ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? trans_product_status
--

-- ??????? winkelor_db.trans_product_status ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? cart_details
--

-- ??????? winkelor_db.cart_details ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? orders_details
--

-- ??????? winkelor_db.orders_details ?? ???????? ??????

-- 
-- ????? ?????? ??? ??????? wishlist_details
--

-- ??????? winkelor_db.wishlist_details ?? ???????? ??????

-- 
-- ???????????? ?????????? ????? SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- ????????? ??????? ??????
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;