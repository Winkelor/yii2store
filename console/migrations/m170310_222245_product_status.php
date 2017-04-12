<?php

use yii\db\Migration;
use yii\db\Schema;

//статус товару
class m170310_222245_product_status extends Migration
{
    public function up()
    {
        $this->createTable('{{%product_status}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'department_id' => Schema::TYPE_BIGINT, /* optional */
            'product_id' => Schema::TYPE_BIGINT,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,

            'is_action' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170310_222245_product_status cannot be reverted.\n";
        $this->dropTable('{{%}}');
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
