<?php

use yii\db\Migration;
use yii\db\Schema;
// https://msdn.microsoft.com/ru-ru/library/ee825488(v=cs.20).aspx
// (cultures)
class m170326_121012_languages extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%languages}}', [
            'id' => Schema::TYPE_BIGPK,
            'name' => Schema::TYPE_STRING,
            'iso_639' => Schema::TYPE_STRING, // ftp://ftp.fu-berlin.de/doc/iso/iso3166-countrycodes.txt

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);


    }

    public function down()
    {
        echo "m170326_121012_languages cannot be reverted.\n";

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
