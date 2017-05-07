<?php

use yii\db\Migration;
use yii\db\Schema;

class m170507_161106_comment_status extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable('{{%comment_status}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,

            'is_active' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170507_161106_comment_status cannot be reverted.\n";

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
