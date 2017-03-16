<?php

use yii\db\Migration;
use yii\db\Schema;

class m170305_152112_products extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%products }}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,
            'department_id' => Schema::TYPE_BIGPK, /* optional */

            'category_id' => Schema::TYPE_STRING,

            // артикул
            'vendor_code' => Schema::TYPE_STRING,
            'name' => Schema::TYPE_STRING,
            //короткий опис
            'short_description' => Schema::TYPE_STRING,
            //великий опис
            'description' => Schema::TYPE_STRING,

            // цена закупки
            'purchase_price' => Schema::TYPE_DECIMAL,
            // цена продажи кінцева
            'selling_price'  => Schema::TYPE_DECIMAL,

            // img is many to many

            //показувати чи ні
            'is_active' => Schema::TYPE_BOOLEAN,

            //seo на shops_seo
            'seo_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_152112_products cannot be reverted.\n";

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
