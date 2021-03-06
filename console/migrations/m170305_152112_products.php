<?php

use yii\db\Migration;
use yii\db\Schema;
// товари , але є і інші таблиці для даних товару
class m170305_152112_products extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%products}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'department_id' => Schema::TYPE_BIGINT, /* optional */

            'category_id' => Schema::TYPE_BIGINT,

            // артикул
            'vendor_code' => Schema::TYPE_STRING,
            'name' => Schema::TYPE_STRING,
            //короткий опис
            'short_description' => Schema::TYPE_STRING,
            //великий опис
            'description' => Schema::TYPE_STRING,

            // цена %products_attributes_logistics_info, тк на амазаоні різні атрибути - різна ціна

            // цена закупки (базова , копіюєтьс в атрибут при створенні)
            'purchase_price' => Schema::TYPE_DECIMAL, // може бути різно напевно від атрибутів
            // цена продажи кінцева (базова , копіюєтьс в атрибут при створенні)
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
        $this->dropTable('{{%products}}');
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
