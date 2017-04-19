<?php

use yii\db\Migration;
use yii\db\Schema;

// очікується до поставки нп, знятий з продажу і все таке, має бути встановлене вінкелор
class m170410_123909_products_attributes_logistics_info_statuses extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%products_attributes_logistics_info_statuses}}', [
            'id' => Schema::TYPE_BIGPK,
            'name' => Schema::TYPE_STRING,
            'comment' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170418_215601_products_attributes_logistics_info_statuses cannot be reverted.\n";

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
