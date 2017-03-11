<?php

use yii\db\Migration;
use yii\db\Schema;

class m170311_140635_addresses extends Migration
{
    public function up()
    {
        $this->createTable('{{%addresses}}', [
            'id' => Schema::TYPE_BIGPK,

//            Petrenko Ivan Leonidovych
//            vul. Shevchenka, bud. 17
//            m. Bila Tserkva
//            Kyivs'ka obl.
//            09117
//            UKRAINE

//            Name of addressee
//            Streetname, number, apartment/room
//            Village/city/town
//            Raion, Region
//            Postal code
//            Country

            'name' => Schema::TYPE_STRING,
            'comment' => Schema::TYPE_STRING, // address 2 for reship service
            'phone' => Schema::TYPE_STRING,
            'street' => Schema::TYPE_STRING,
            'city' => Schema::TYPE_STRING,
            'region'  => Schema::TYPE_STRING,
            'state' => Schema::TYPE_STRING,
            'index' => Schema::TYPE_STRING,
            'country' => Schema::TYPE_STRING,


            'description' => Schema::TYPE_STRING, // another info for manegers

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170311_140635_addresses cannot be reverted.\n";

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
