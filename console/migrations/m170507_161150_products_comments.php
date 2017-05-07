<?php

use yii\db\Migration;
use yii\db\Schema;

class m170507_161150_products_comments extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable('{{%products_comments}}', [
            'id' => Schema::TYPE_PK,
            'shop_id' => Schema::TYPE_BIGINT,
            'department_id' => Schema::TYPE_BIGINT, /* optional */

            'product_id' => Schema::TYPE_BIGINT,
            'user_client_id' => Schema::TYPE_BIGINT,
            'parent_id' => Schema::TYPE_INTEGER,
            'comment' => Schema::TYPE_STRING,

            'status_id' => Schema::TYPE_INTEGER, //(verification, allow, blocked)

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        //
    }

    public function down()
    {
        echo "m170507_161150_products_comments cannot be reverted.\n";

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
