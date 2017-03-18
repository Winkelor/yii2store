<?php

use yii\db\Migration;
use yii\db\Schema;

class m170312_143004_image_info_categories extends Migration
{
    public function up()
    {
        $this->createTable('{{%image_info_categories}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'image_info_id' => Schema::TYPE_BIGINT,
            'categories_id' => Schema::TYPE_BIGINT,


            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170312_143004_image_info_categories cannot be reverted.\n";

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
