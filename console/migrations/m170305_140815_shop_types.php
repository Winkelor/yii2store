<?php
//ця таблиця описує магазини

use yii\db\Migration;
use yii\db\Schema; // http://www.yiiframework.com/doc-2.0/yii-db-schema.html

//типи магазинів
class m170305_140815_shop_types extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%shop_types}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'comment' => Schema::TYPE_STRING,

            'is_active' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);

    }

    public function down()
    {
        echo "m170305_140818_shops cannot be reverted.\n";
        $this->dropTable('{{%shop_types}}');
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
