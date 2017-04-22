<?php

use yii\db\Migration;
use yii\db\Schema;

class m170317_005102_wishlist extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%wishlist}}', [
            'id' => Schema::TYPE_BIGPK,
//            'shop_id' => Schema::TYPE_BIGINT, // а нашо воно тут О_О
//            'department_id' => Schema::TYPE_BIGINT, /* optional */

            // коментар до замовлення
            'name' => Schema::TYPE_STRING, // подарки маме
            'description' => Schema::TYPE_STRING, // опис
            'public' => Schema::TYPE_BOOLEAN, // public or private

            //покупець
            'user_client_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170317_005102_wishlist cannot be reverted.\n";
        $this->dropTable('{{%wishlist}}');
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
