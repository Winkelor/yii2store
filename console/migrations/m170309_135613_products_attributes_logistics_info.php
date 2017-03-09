<?php

use yii\db\Migration;
use yii\db\Schema;

// є товари, кросівки, є атрибути 29 розмір, колір чорний, так от ця інфа містить кількість товару ітд, що можна було виборку робити

class m170309_135613_products_attributes_logistics_info extends Migration
{
    public function up()
    {

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
