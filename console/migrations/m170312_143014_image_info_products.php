<?php

use yii\db\Migration;

class m170312_143014_image_info_products extends Migration
{
    public function up()
    {
        $this->createTable('{{%image_info_products}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,
            'image_info_id' => Schema::TYPE_BIGPK,
            'products_id' => Schema::TYPE_BIGPK,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170312_143014_image_info_products cannot be reverted.\n";

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
