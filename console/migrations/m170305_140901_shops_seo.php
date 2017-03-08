<?php
//ця таблиця описує seo для всіх сторінок

use yii\db\Migration;
use yii\db\Schema;

class m170305_140901_shops_seo extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%shops_seo}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,

            'meta_header' => Schema::TYPE_STRING,
            'meta_description' => Schema::TYPE_STRING,
            'human_readable_url' => Schema::TYPE_STRING,
            'other_seo_info' => Schema::TYPE_TEXT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_140901_shops_seo cannot be reverted.\n";

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