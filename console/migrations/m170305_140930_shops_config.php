<?php
//конфігурація магазину
use yii\db\Migration;
use yii\db\Schema;

// налаштування магазину ,основна валюта ?
class m170305_140930_shops_config extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%shop_config}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            //'department_id' => Schema::TYPE_BIGINT, /* optional */ у депртамента окремі налаштування

            'name' => Schema::TYPE_STRING,
            'value' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_140930_shops_config cannot be reverted.\n";
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
