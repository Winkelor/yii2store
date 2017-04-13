<?php

use yii\db\Migration;
use yii\db\Schema;

class m170312_143014_image_info_products extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%image_info_products}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'image_info_id' => Schema::TYPE_BIGINT,
            'products_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170312_143014_image_info_products cannot be reverted.\n";
        $this->dropTable('{{%image_info_products}}');
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
