<?php

use yii\db\Migration;
use yii\db\Schema;

// є товари, кросівки, є атрибути 29 розмір, колір чорний, так от ця інфа містить кількість товару ітд, що можна було виборку робити
//  в принципі це все можна було запхать в атрибути, але так краще напевно

class m170309_135613_products_attributes_logistics_info extends Migration
{
    public function up()
    {
        $this->createTable('{{%products_attributes_logistics_info}}', [
            'id' => Schema::TYPE_BIGPK,
            // магазин
            'shop_id' => Schema::TYPE_BIGPK,
            // відділ магазину
            'department_id' => Schema::TYPE_BIGPK, /* optional */
            // товар
            'product_id' => Schema::TYPE_BIGPK,

            //атрибути в багато багато attributes_products_group}

            // ціна закупівлі
            'purchase_price' => Schema::TYPE_DECIMAL,
            // ціна продажу (кінцева)
            'selling_price'  => Schema::TYPE_DECIMAL,
            // кількість
            'count' => Schema::TYPE_INTEGER,

            // очікується до поставки нп, знятий з продажу і все таке
            'status_id' =>  Schema::TYPE_INTEGER,
            //активний чи ні (нашо воно ?)
            'is_action' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170309_135613_products_atributes_logistics_info cannot be reverted.\n";

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
