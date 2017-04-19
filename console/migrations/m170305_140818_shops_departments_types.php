<?php

use yii\db\Migration;

class m170305_140818_shops_departments_types extends Migration

{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%shops_departments_types}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'comment' => Schema::TYPE_STRING,

            'is_active' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170419_160122_shops_departments_types cannot be reverted.\n";

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
