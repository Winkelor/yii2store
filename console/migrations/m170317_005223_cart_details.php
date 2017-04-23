<?php

use yii\db\Migration;
use yii\db\Schema;

class m170317_005223_cart_details extends Migration
{
    public function up()
    {
        $this->createTable('{{%cart_details}}', [
            'id' => Schema::TYPE_BIGPK,
            // магазин
            'shop_id' => Schema::TYPE_BIGINT,
            // відділ магазину
            'department_id' => Schema::TYPE_BIGINT, /* optional */
            // товар
            'product_id' => Schema::TYPE_BIGINT,
            // атрибут товару (логістики)
            'products_attributes_logistics_info_id' => Schema::TYPE_BIGINT,
            //група атрибутів
            'attributes_products_group_id' => Schema::TYPE_BIGINT,

            'cart_id'=> Schema::TYPE_BIGINT,
            // кількість
            'count' => Schema::TYPE_INTEGER,
            //статус
            'status_id' =>  Schema::TYPE_BIGINT,

            //покупець
            'user_client_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170317_005223_cart_details cannot be reverted.\n";
        $this->dropTable('{{%cart_details}}');
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
