<?php

use yii\db\Migration;
use yii\db\Schema;
// https://msdn.microsoft.com/ru-ru/library/ee825488(v=cs.20).aspx
//https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html
// (cultures)
class m170326_121012_languages extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%languages}}', [
            'id' => Schema::TYPE_BIGPK,

            //сам код мови буде відповідати за одну мову в різних країнах en-US en-UK
            //'country_id' => Schema::TYPE_STRING, // якщот реба різні країни, то це сама мова або en_us або en_uk

            'name' => Schema::TYPE_STRING,
            'iso_639_code' => Schema::TYPE_STRING, // ftp://ftp.fu-berlin.de/doc/iso/iso3166-countrycodes.txt

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
