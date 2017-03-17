<?php

use yii\db\Migration;

class m170317_005203_wishlist_details extends Migration
{
    public function up()
    {
        $this->createTable('{{%_details}}', [
            'id' => Schema::TYPE_BIGPK,
            // магазин
            'shop_id' => Schema::TYPE_BIGPK,
            // відділ магазину
            'department_id' => Schema::TYPE_BIGPK, /* optional */
            // товар
            'product_id' => Schema::TYPE_BIGPK,
            // атрибут товару (логістики)
            'products_attributes_logistics_info' => Schema::TYPE_BIGPK,
            // ціна для покупця
            'price' => Schema::TYPE_DECIMAL,
            // кількість
            'count' => Schema::TYPE_INTEGER,
            //статус
            'status_id' =>  Schema::TYPE_INTEGER,

            //покупець
            'user_client_id' => Schema::TYPE_INTEGER,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170317_005203_wishlist_details cannot be reverted.\n";

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
