--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.341.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 8/29/2016 4:16:28 PM
-- Версия сервера: 5.6.27-75.0-log
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE winkelor_db;

--
-- Описание для таблицы categories
--
DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  id INT(11) NOT NULL AUTO_INCREMENT,
  parent_id INT(11) DEFAULT NULL,
  name VARCHAR(50) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  displayed TINYINT(1) DEFAULT NULL,
  cover_image VARCHAR(512) DEFAULT NULL,
  thumbnail VARCHAR(512) DEFAULT NULL,
  group_access VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_categories_categories_id FOREIGN KEY (parent_id)
    REFERENCES categories(id) ON DELETE CASCADE ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 8
AVG_ROW_LENGTH = 1365
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы managers
--
DROP TABLE IF EXISTS managers;
CREATE TABLE managers (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  last_name VARCHAR(50) DEFAULT NULL,
  password VARCHAR(255) DEFAULT NULL,
  email VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы manegers_gropus
--
DROP TABLE IF EXISTS manegers_gropus;
CREATE TABLE manegers_gropus (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  rights VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы migration
--
DROP TABLE IF EXISTS migration;
CREATE TABLE migration (
  version VARCHAR(180) NOT NULL,
  apply_time INT(11) DEFAULT NULL,
  PRIMARY KEY (version)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы specification_types
--
DROP TABLE IF EXISTS specification_types;
CREATE TABLE specification_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  value VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы user
--
DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  last_name VARCHAR(255) DEFAULT NULL,
  username VARCHAR(255) NOT NULL,
  auth_key VARCHAR(32) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  password_reset_token VARCHAR(255) DEFAULT NULL,
  email VARCHAR(255) NOT NULL,
  confirmed VARCHAR(255) DEFAULT NULL,
  status SMALLINT(6) NOT NULL DEFAULT 10,
  created_at INT(11) NOT NULL,
  updated_at INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX email (email),
  UNIQUE INDEX username (username)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы contacts_user
--
DROP TABLE IF EXISTS contacts_user;
CREATE TABLE contacts_user (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_contacts_user_users_id FOREIGN KEY (user_id)
    REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы orders
--
DROP TABLE IF EXISTS orders;
CREATE TABLE orders (
  id INT(11) NOT NULL AUTO_INCREMENT,
  description VARCHAR(255) DEFAULT NULL,
  price_full FLOAT DEFAULT NULL,
  user_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_orders_users_id FOREIGN KEY (user_id)
    REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы products
--
DROP TABLE IF EXISTS products;
CREATE TABLE products (
  id INT(11) NOT NULL AUTO_INCREMENT,
  category_id INT(11) DEFAULT NULL,
  reference VARCHAR(255) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL,
  description VARCHAR(255) DEFAULT NULL,
  base_price FLOAT DEFAULT NULL COMMENT 'purchase_price',
  price FLOAT DEFAULT NULL,
  tax_rule_id INT(11) DEFAULT NULL,
  final_price FLOAT DEFAULT NULL,
  count INT(11) DEFAULT NULL COMMENT 'Quantity',
  displayed TINYINT(1) DEFAULT NULL,
  image VARCHAR(512) DEFAULT NULL,
  status_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_products_categories_id FOREIGN KEY (category_id)
    REFERENCES categories(id) ON DELETE CASCADE ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 1260
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы specification_category_notes
--
DROP TABLE IF EXISTS specification_category_notes;
CREATE TABLE specification_category_notes (
  id INT(11) NOT NULL,
  parent_id INT(11) DEFAULT NULL,
  name VARCHAR(255) DEFAULT NULL COMMENT 'socket',
  specification_type_id INT(11) DEFAULT NULL COMMENT 'str',
  category_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id (id),
  CONSTRAINT FK_specification_category_notes_categories_id FOREIGN KEY (category_id)
    REFERENCES categories(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_specification_category_notes_specification_category_notes_id FOREIGN KEY (parent_id)
    REFERENCES specification_category_notes(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_specification_category_notes_specification_types_id FOREIGN KEY (specification_type_id)
    REFERENCES specification_types(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы users_settings
--
DROP TABLE IF EXISTS users_settings;
CREATE TABLE users_settings (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_users_settings_users_id FOREIGN KEY (user_id)
    REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы withlist
--
DROP TABLE IF EXISTS withlist;
CREATE TABLE withlist (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  user_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_withlist_users_id FOREIGN KEY (user_id)
    REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы cart_notes
--
DROP TABLE IF EXISTS cart_notes;
CREATE TABLE cart_notes (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  product_id INT(11) NOT NULL,
  count INT(11) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_cart_notes_products_id FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT FK_cart_notes_users_id FOREIGN KEY (user_id)
    REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы contacts_addresses
--
DROP TABLE IF EXISTS contacts_addresses;
CREATE TABLE contacts_addresses (
  id INT(11) NOT NULL,
  Country VARCHAR(255) DEFAULT NULL,
  State VARCHAR(255) DEFAULT NULL,
  Region VARCHAR(255) DEFAULT NULL,
  City VARCHAR(255) DEFAULT NULL,
  Address VARCHAR(512) DEFAULT NULL,
  ZIP VARCHAR(30) DEFAULT NULL,
  contacts_user_id INT(11) DEFAULT NULL,
  main TINYINT(1) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_contacts_addresses_contacts_user_id FOREIGN KEY (contacts_user_id)
    REFERENCES contacts_user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы contacts_email
--
DROP TABLE IF EXISTS contacts_email;
CREATE TABLE contacts_email (
  id INT(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) DEFAULT NULL,
  contacts_user_id INT(11) DEFAULT NULL,
  main TINYINT(1) DEFAULT NULL,
  confirmed TINYINT(1) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_contacts_email_contacts_user_id FOREIGN KEY (contacts_user_id)
    REFERENCES contacts_user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы contacts_phones
--
DROP TABLE IF EXISTS contacts_phones;
CREATE TABLE contacts_phones (
  id INT(11) NOT NULL AUTO_INCREMENT,
  phone VARCHAR(50) DEFAULT NULL,
  contacts_user_id INT(11) DEFAULT NULL,
  main TINYINT(1) DEFAULT NULL,
  confirmed TINYINT(4) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_contacts_phones_contacts_user_id FOREIGN KEY (contacts_user_id)
    REFERENCES contacts_user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы order_notes
--
DROP TABLE IF EXISTS order_notes;
CREATE TABLE order_notes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  product_id INT(11) DEFAULT NULL,
  price FLOAT DEFAULT NULL,
  order_id INT(11) DEFAULT NULL,
  count INT(11) DEFAULT 1,
  PRIMARY KEY (id),
  CONSTRAINT FK_orders_ordernotes FOREIGN KEY (order_id)
    REFERENCES orders(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_ordersnotes_products_id FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы product_comparer
--
DROP TABLE IF EXISTS product_comparer;
CREATE TABLE product_comparer (
  id INT(11) NOT NULL AUTO_INCREMENT,
  category_id INT(11) DEFAULT NULL,
  product_id INT(11) DEFAULT NULL,
  user_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_product_comparer_categories_id FOREIGN KEY (category_id)
    REFERENCES categories(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_product_comparer_products_id FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_product_comparer_users_id FOREIGN KEY (user_id)
    REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы specification_product_notes
--
DROP TABLE IF EXISTS specification_product_notes;
CREATE TABLE specification_product_notes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  value VARCHAR(255) DEFAULT NULL,
  product_id INT(11) DEFAULT NULL,
  specificaton_category_note_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_specification_product_notes_products_id FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_specification_product_notes_specification_category_notes_id FOREIGN KEY (specificaton_category_note_id)
    REFERENCES specification_category_notes(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы withlist_notes
--
DROP TABLE IF EXISTS withlist_notes;
CREATE TABLE withlist_notes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  withlist_id INT(11) DEFAULT NULL,
  product_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_withlist_notes_products_id FOREIGN KEY (product_id)
    REFERENCES products(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_withlist_notes_withlist_id FOREIGN KEY (withlist_id)
    REFERENCES withlist(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_unicode_ci
ROW_FORMAT = DYNAMIC;

-- 
-- Вывод данных для таблицы categories
--
INSERT INTO categories VALUES
(1, NULL, 'Electronics', 'Electronics', -1, 'http://localhost/yii2store/backend/web/assets/1acaa24/img/user2-160x160.jpg', '', ''),
(2, 1, '2', '2', 0, '', '', ''),
(4, 1, '3', '3', 1, '1', '1', '1'),
(5, NULL, 'Animals', '', NULL, '', '', ''),
(6, 4, 'fgdigfdgfgdfkd', '', 1, '', '', ''),
(7, 4, 'dfdfdf', '', NULL, '', '', '');

-- 
-- Вывод данных для таблицы managers
--

-- Таблица winkelor_db.managers не содержит данных

-- 
-- Вывод данных для таблицы manegers_gropus
--

-- Таблица winkelor_db.manegers_gropus не содержит данных

-- 
-- Вывод данных для таблицы migration
--
INSERT INTO migration VALUES
('m000000_000000_base', 1453981580),
('m130524_201442_init', 1453981591);

-- 
-- Вывод данных для таблицы specification_types
--

-- Таблица winkelor_db.specification_types не содержит данных

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 'John', 'Connor', 'root', 'VJK5jk1-giyaunObWsfnb_kjeomJRYry', '$2y$13$FDb4OQZ3Q3iOFq.Nrlnt3OQyrtgY4PaziSHvFdsaL/yHt5NWMZ.ua', NULL, 'root@root.rt', NULL, 10, 1453982988, 1453982988),
(2, NULL, NULL, 'Asguard', '2tuIDjx16AcKAp2ZG5EUvhheBGDqfGJb', '$2y$13$.i0zt8EusvFOX1bgxlBr2OUEzkSy..65pA4BX4OmbA40bnVcaWvdO', NULL, 'antonbeletskyeu@gmail.com', NULL, 10, 1472476482, 1472476482);

-- 
-- Вывод данных для таблицы contacts_user
--

-- Таблица winkelor_db.contacts_user не содержит данных

-- 
-- Вывод данных для таблицы orders
--

-- Таблица winkelor_db.orders не содержит данных

-- 
-- Вывод данных для таблицы products
--
INSERT INTO products VALUES
(1, 2, '2', 'жопа', '1', 12.1222, NULL, NULL, NULL, NULL, 1, '', NULL),
(2, 1, '1', '1', '', 1, 1, 1, 1, 12, 1, '1', 1),
(3, 2, '1', '', '', NULL, NULL, NULL, NULL, NULL, 1, '', NULL);

-- 
-- Вывод данных для таблицы specification_category_notes
--
INSERT INTO specification_category_notes VALUES
(1, NULL, '1', NULL, NULL);

-- 
-- Вывод данных для таблицы users_settings
--

-- Таблица winkelor_db.users_settings не содержит данных

-- 
-- Вывод данных для таблицы withlist
--

-- Таблица winkelor_db.withlist не содержит данных

-- 
-- Вывод данных для таблицы cart_notes
--

-- Таблица winkelor_db.cart_notes не содержит данных

-- 
-- Вывод данных для таблицы contacts_addresses
--

-- Таблица winkelor_db.contacts_addresses не содержит данных

-- 
-- Вывод данных для таблицы contacts_email
--

-- Таблица winkelor_db.contacts_email не содержит данных

-- 
-- Вывод данных для таблицы contacts_phones
--

-- Таблица winkelor_db.contacts_phones не содержит данных

-- 
-- Вывод данных для таблицы order_notes
--

-- Таблица winkelor_db.order_notes не содержит данных

-- 
-- Вывод данных для таблицы product_comparer
--

-- Таблица winkelor_db.product_comparer не содержит данных

-- 
-- Вывод данных для таблицы specification_product_notes
--

-- Таблица winkelor_db.specification_product_notes не содержит данных

-- 
-- Вывод данных для таблицы withlist_notes
--

-- Таблица winkelor_db.withlist_notes не содержит данных

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;