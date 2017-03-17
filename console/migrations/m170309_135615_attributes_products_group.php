<?php

use yii\db\Migration;
use yii\db\Schema;

//ця таблиця відповідає за групування атрибутів, нп чоботи червоні, шкіряні - одна група атрибутів
class m170309_135615_attributes_products_group extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%attributes_products_group}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,
            'department_id' => Schema::TYPE_BIGPK, /* optional */

            'product_id' => Schema::TYPE_BIGPK, //ex 1
            'products_attributes_logistics_inf_id' => Schema::TYPE_BIGPK, //ex 1  1 1
            'attributes_products_id' => Schema::TYPE_BIGPK, //ex 1 2 3

            // додаткова інфа
            'attributes_categories_id' => Schema::TYPE_BIGPK,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170317_105954_attributes_products_group cannot be reverted.\n";

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