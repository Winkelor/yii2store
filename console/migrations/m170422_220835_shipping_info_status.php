<?php

use yii\db\Migration;
use yii\db\Schema;

class m170422_220835_shipping_info_status extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%shipping_info_status}}', [
            'id' => Schema::TYPE_BIGPK,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,

            'is_active' => Schema::TYPE_BOOLEAN,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170422_220835_shipping_info_status cannot be reverted.\n";

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
