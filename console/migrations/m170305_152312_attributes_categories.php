<?php

use yii\db\Migration;

class m170305_152312_attributes_categories extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_152312_attributes_categories cannot be reverted.\n";

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
