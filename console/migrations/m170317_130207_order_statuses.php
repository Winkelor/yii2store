<?php

use yii\db\Migration;
use yii\db\Schema;

//статус замовлення глобальні
// додатеово є коменти m170410_123909_order_comments
class m170317_130207_order_statuses extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%order_statuses}}', [
            'id' => Schema::TYPE_BIGPK,
//            'shop_id' => Schema::TYPE_BIGINT,
//            'department_id' => Schema::TYPE_BIGINT, /* optional */

            'name' => Schema::TYPE_STRING,

            'is_active' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170317_130207_order_statuses cannot be reverted.\n";
        $this->dropTable('{{%order_statuses}}');
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
