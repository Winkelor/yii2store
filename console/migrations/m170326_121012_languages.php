<?php

use yii\db\Migration;
use yii\db\Schema;

// see it https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
// see it https://www.w3schools.com/tags/ref_language_codes.asp
class m170326_121012_languages extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%languages}}', [
            'id' => Schema::TYPE_BIGPK,
            'en_name' => Schema::TYPE_STRING, // ukrainian
            'iso639_1' => Schema::TYPE_STRING, //uk
            'native_name' => Schema::TYPE_STRING, //українська
            'native_name_short' => Schema::TYPE_STRING, //укр


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
