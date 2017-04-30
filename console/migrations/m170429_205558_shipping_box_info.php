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
            // weight in kg вага
            'weight' => Schema::TYPE_DECIMAL,
            // length in cm довжина
            'length' => Schema::TYPE_DECIMAL,
            // width in cm ширина
            'width' => Schema::TYPE_DECIMAL,
            // height in cm висота
            'height' => Schema::TYPE_DECIMAL,
            // not drop не кидати
            'not_drop' => Schema::TYPE_BOOLEAN,
            // type of package (box or packet-packet) (коробка або пакет-бандероль)
            'type_package_id' => Schema::TYPE_INTEGER,
            // comment
            'comment' => Schema::TYPE_STRING, // додаткова інформація

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
