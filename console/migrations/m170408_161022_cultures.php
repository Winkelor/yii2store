<?php

use yii\db\Migration;
use yii\db\Schema;

// https://msdn.microsoft.com/en-us/library/ee825488(v=cs.20).aspx
// using en-US for default
class m170408_161022_cultures extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%cultures}}', [
            'id' => Schema::TYPE_BIGPK,
            'language_culture_name' => Schema::TYPE_STRING, // en-CA
            'display_ame' => Schema::TYPE_STRING,           // English - Canada
            'culture_code' => Schema::TYPE_STRING,          // 0x1009
            'ISO_639x_value' => Schema::TYPE_STRING,        // ENC

            'language_id' => Schema::TYPE_INTEGER,           // ???
            'country_id' => Schema::TYPE_INTEGER,            // ???

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170408_161022_cultures cannot be reverted.\n";
        $this->dropTable('{{%cultures}}');
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
