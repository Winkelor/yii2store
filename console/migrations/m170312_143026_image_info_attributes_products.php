<?php

use yii\db\Migration;
use yii\db\Schema;

class m170312_143026_image_info_attributes_products extends Migration
{
    public function up()
    {
        $this->createTable('{{%image_info_attributes_products}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'image_info_id' => Schema::TYPE_BIGINT,
            'attributes_products_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170312_143026_image_info_attributes_products cannot be reverted.\n";
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
