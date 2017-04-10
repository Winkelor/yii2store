<?php

use yii\db\Migration;
use yii\db\Schema;

//це коментарі менеджера до замовлення
class m170410_123909_order_comments extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%order_comments}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'department_id' => Schema::TYPE_BIGINT, /* optional */

            'order_id' => Schema::TYPE_BIGINT, /* for order, but not order details */
            'manager_id' =>  Schema::TYPE_BIGINT, // user_admin
            'comment' => Schema::TYPE_STRING, // заказ застрял в жопе бегемота

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170410_123909_order_comments cannot be reverted.\n";

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
