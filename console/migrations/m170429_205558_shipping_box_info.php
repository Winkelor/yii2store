<?php

use yii\db\Migration;
use yii\db\Schema;

// це опис коробки, в якій доставляють товар, і на цей запис посилається логістик інфо і шипінг інфо
// shipping_box_info_id повинні мати shipping_info та products_attributes_logistics_info
// таблиця product може мати це як базові налаштування
class m170429_205558_shipping_box_info extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%shipping_box_info}}', [
            'id' => Schema::TYPE_BIGPK,
            // магазин
            'shop_id' => Schema::TYPE_BIGINT,
            // відділ магазину
            'department_id' => Schema::TYPE_BIGINT, /* optional */

            // цінність пакунку
            'price' => Schema::TYPE_DECIMAL,

            // ширина в см
            // довжина в см
            // вистоа в см
            // вага в кг
            // рівень хрупкості
            // тип пакунку (коробка або пакет-бандероль )



            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170429_205558_shipping_box_info cannot be reverted.\n";

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
