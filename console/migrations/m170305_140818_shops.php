<?php
/*
shops
-id // ключ
-name // ім'я
-short_name // коротке ім'я

-main_user_id // юзер що створив магазин backend user
-legal_info_id // юридична інформація

-type_id // тип магазину
-status_id // статус магазину

-shop_config_id // налаштування магазину
-shop_seo_config_id // сео інфа магазину
-shop_commerce_data // комерційна інфа магазину

 */

use yii\db\Migration;
use yii\db\Schema; // http://www.yiiframework.com/doc-2.0/yii-db-schema.html

class m170305_140818_shops extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%shops}}', [
            'id' => Schema::TYPE_BIGPK,
            'name' => Schema::TYPE_STRING,
            'short_name' => Schema::TYPE_STRING,

            'main_user_id' => Schema::TYPE_INTEGER, //backend user
            'legal_info_id' => Schema::TYPE_INTEGER, //shops_legal_info table
            'type_id' => Schema::TYPE_INTEGER, //shops_types table
            'status_id' => Schema::TYPE_INTEGER, //shops_statuses table

            'config_id' => Schema::TYPE_INTEGER, //shops_config_table
            'seo_config_id' => Schema::TYPE_INTEGER, //shops_seo_table or hust seo table
            'commerce_data' => Schema::TYPE_INTEGER,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);

    }

    public function down()
    {
        echo "m170305_140818_shops cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
