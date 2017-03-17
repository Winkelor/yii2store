<?php
use yii\db\Migration;
use yii\db\Schema;

//налаштування департаменту
class m170305_140930_departments_config extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%departments_config}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,
            'department_id' => Schema::TYPE_BIGPK,

            'name' => Schema::TYPE_STRING,
            'value' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_140930_departments_config cannot be reverted.\n";

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
