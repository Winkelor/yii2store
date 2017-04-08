<?php

use yii\db\Migration;
use yii\db\Schema;

class m170326_121012_languages extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%languages}}', [
            'id' => Schema::TYPE_BIGPK,
            'en_name' => Schema::TYPE_STRING, // ukrainian
            'native_name' => Schema::TYPE_STRING, //українська
            'code' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);


    }

    public function down()
    {
        echo "m170326_121012_languages cannot be reverted.\n";

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
