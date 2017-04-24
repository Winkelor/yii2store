<?php

use yii\db\Migration;
use yii\db\Schema;

class m170424_085325_shops_cultures extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%shops_cultures}}', [
            'id' => Schema::TYPE_BIGPK,

            'shop_id' => Schema::TYPE_BIGINT,
            'culture_id' => Schema::TYPE_BIGINT,

            'is_default' => Schema::TYPE_BOOLEAN,
            'is_second' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170424_085325_shops_cultures cannot be reverted.\n";

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
