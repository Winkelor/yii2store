<?php
// https://technet.microsoft.com/it-it/sysinternals/ee825488
// https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
// 3166 http://kirste.userpage.fu-berlin.de/diverse/doc/ISO_3166.html
// ftp://ftp.fu-berlin.de/doc/iso/iso3166-countrycodes.txt
// https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html


use yii\db\Migration;
use yii\db\Schema;

class m170326_120957_countries extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%countries}}', [
            'id' => Schema::TYPE_BIGPK,
            'name' => Schema::TYPE_STRING,
            'iso_3166-1_code' => Schema::TYPE_STRING, // ftp://ftp.fu-berlin.de/doc/iso/iso3166-countrycodes.txt

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170326_120957_countries cannot be reverted.\n";

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
