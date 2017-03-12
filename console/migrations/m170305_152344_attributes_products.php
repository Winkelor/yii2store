<?php

use yii\db\Migration;
use yii\db\Schema;

//
class m170305_152344_attributes_products extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%attributes_products}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,

            'product_id' => Schema::TYPE_BIGPK,
            'value' => Schema::TYPE_STRING,

//            /// img`s path замінити на бюагато-багато з image_info
//            // обложка
//            'cover_img' => Schema::TYPE_STRING,
//            // мініатюра
//            'thumbnail_img' => Schema::TYPE_STRING,
//            // мініатюра меню
//            'thumbnails_img' => Schema::TYPE_STRING,

            //інформація про товар, кількість кросівок 42 розміру і так далі, може зробити логістичний дескрриптор на товар?

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_152344_attributes_products cannot be reverted.\n";

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
