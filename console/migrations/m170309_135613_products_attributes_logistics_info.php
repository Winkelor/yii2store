<?php

use yii\db\Migration;
use yii\db\Schema;

// є товари, кросівки, є атрибути 29 розмір, колір чорний, так от ця інфа містить кількість товару ітд, що можна було виборку робити
//  в принципі це все можна було запхать в атрибути, але так краще напевно

class m170309_135613_products_attributes_logistics_info extends Migration
{
    public function up()
    {
        $this->createTable('{{%attributes_products}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,

            'product_id' => Schema::TYPE_BIGPK,
            'product_attribute_id' => Schema::TYPE_BIGPK,

            'price' => Schema::TYPE_DECIMAL,

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
