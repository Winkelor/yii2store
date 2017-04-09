<?php

use yii\db\Migration;
use yii\db\Schema;

// адреси
class m170311_140635_addresses extends Migration
{
    public function up()
    {
        $this->createTable('{{%addresses}}', [
            'id' => Schema::TYPE_BIGPK,

            'name' => Schema::TYPE_STRING, // Богдан Коваленко
            'comment' => Schema::TYPE_STRING, // address 2 for reship service
            'phone' => Schema::TYPE_STRING, // 102
            'street' => Schema::TYPE_STRING, // пр Степана Бандери
            'build' => Schema::TYPE_STRING, // дім 4A
            'apartments'  => Schema::TYPE_STRING, // кв 189 (3 під'їзд)
            'city' => Schema::TYPE_STRING, // Бандероград
            'region'  => Schema::TYPE_STRING, // Львівська область
            'state' => Schema::TYPE_STRING, // нема
            'post_index' => Schema::TYPE_STRING, // 00001
            'country' => Schema::TYPE_STRING, // Україна

            'security_access_code' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING, // another info for managers

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170311_140635_addresses cannot be reverted.\n";

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
