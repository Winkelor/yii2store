<?php

use yii\db\Migration;
use yii\db\Schema;

// валюта
class m170423_123502_currencies extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%currencies}}', [
            'id' => Schema::TYPE_BIGPK,
            'name' => Schema::TYPE_STRING, // назва
            'short_name' => Schema::TYPE_STRING, // назва коротка
            'is_main' => Schema::TYPE_BOOLEAN, // головна (одна)
            'rate' => Schema::TYPE_DECIMAL, // курс до головної

            'is_active' => Schema::TYPE_BOOLEAN, // активна

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170423_123502_currencies cannot be reverted.\n";

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
