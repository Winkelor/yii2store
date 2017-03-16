<?php

use yii\db\Migration;
use yii\db\Schema;

// глобальні
//типи атрибутів обробляються движком магазину, тому продавець не може додати їх сам
class m170305_152144_attributes_types extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%attributes_types}}', [
            'id' => Schema::TYPE_BIGPK,
            'name' => Schema::TYPE_STRING,
            'db_type' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,


            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_152144_attributes_types cannot be reverted.\n";

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
