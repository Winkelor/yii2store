<?php

use yii\db\Migration;
use yii\db\Schema;

//тип замінює цей перелік
///// img`s path
//// обложка
//'cover_img' => Schema::TYPE_STRING,
//// мініатюра
//'thumbnail_img' => Schema::TYPE_STRING,
//// мініатюра меню
//'thumbnails_img' => Schema::TYPE_STRING,

// перелік самих типів
class m170312_132021_image_types extends Migration
{
    public function up()
    {
        $this->createTable('{{%image_types}}', [
            'id' => Schema::TYPE_BIGPK,

            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,

            'is_action' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170312_132021_image_types cannot be reverted.\n";

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
