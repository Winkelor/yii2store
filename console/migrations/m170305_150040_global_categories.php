<?php

use yii\db\Migration;
use yii\db\Schema;

//є категорії магазину, а є глобальна, це такі собі шаблони
class m170305_150040_global_categories extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%global_categories}}', [
            'id' => Schema::TYPE_BIGPK,

            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            'parent_id' => Schema::TYPE_BIGINT,
            // рівень вкладеності
            'level_depth' => Schema::TYPE_INTEGER,

            // img is many to many

            //показувати чи ні
            'is_active' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170308_004740_global_categories cannot be reverted.\n";

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
