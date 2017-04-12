<?php

use yii\db\Migration;
use yii\db\Schema;

//контакти
class m170311_140712_contacts extends Migration
{
    public function up()
    {
        $this->createTable('{{%contacts}}', [
            'id' => Schema::TYPE_BIGPK,

            'name' => Schema::TYPE_STRING,
            'phone' => Schema::TYPE_STRING,
            'second_phone' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING,

            'description' => Schema::TYPE_STRING, // another info for manegers

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170311_140712_contacts cannot be reverted.\n";
        $this->dropTable('{{%contacts}}');
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
