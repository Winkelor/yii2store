<?php

use yii\db\Migration;
use yii\db\Schema;

class m170312_142952_image_info_global_categories extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%image_info_global_categories}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'image_info_id' => Schema::TYPE_BIGINT,
            'global_category_id' => Schema::TYPE_BIGINT,


            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170312_142952_image_info_global_categories cannot be reverted.\n";
        $this->dropTable('{{%image_info_global_categories}}');
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
