<?php

use yii\db\Migration;
use yii\db\Schema;

//групи атрибутів ця таблиця потрібна для групування атрибутів, нп ширина і довжинаа екрану в групі екран
//це групування використовується для виводу інфи
class m170305_152145_attributes_groups extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%attributes_groups}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,
            'category_id' => Schema::TYPE_BIGPK,

            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            //в якому порядку виводяться групи
            'rank' => Schema::TYPE_INTEGER,

            //показувати чи ні
            'is_active' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170309_120601_attributes_groups cannot be reverted.\n";

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
