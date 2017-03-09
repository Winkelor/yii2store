<?php

use yii\db\Migration;
use yii\db\Schema;

class m170305_152312_attributes_categories extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%attributes_categories}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,
            'category_id' => Schema::TYPE_BIGPK,

            'name' => Schema::TYPE_STRING,
            //в якому порядку виводяться групи
            'rank' => Schema::TYPE_INTEGER,

            'attribute_type_id' => Schema::TYPE_BIGINT, // тип для фільтру ліворуч
            'attribute_group_id' => Schema::TYPE_BIGINT, // група, якщо така є

            //показувати чи ні
            'is_active' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_152312_attributes_categories cannot be reverted.\n";

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
