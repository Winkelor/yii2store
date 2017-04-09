<?php
//ця таблиця описує магазини

use yii\db\Migration;
use yii\db\Schema; // http://www.yiiframework.com/doc-2.0/yii-db-schema.html

// статуси магазину
class m170305_140816_shop_statuses extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%shop_statuses}}', [
            'id' => Schema::TYPE_BIGPK,
            'name' => Schema::TYPE_STRING,

            'is_active' => Schema::TYPE_BOOLEAN,

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
