<?php
//комерційна інформація магазину

use yii\db\Migration;

class m170305_140955_shops_commerce_data extends Migration
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
        echo "m170305_140955_shops_commerce_data cannot be reverted.\n";

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
