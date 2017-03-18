<?php

use yii\db\Migration;
use yii\db\Schema;

class m170317_130251_shipping_info extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%shipping_info}}', [
            'id' => Schema::TYPE_BIGPK,
            // трекер відслідковування
            'post_tracker' => Schema::TYPE_STRING,
            //дата відправлення замовлення
            'date_start' => Schema::TYPE_DATETIME,
            // дата приходу до клієнта
            'date_end' => Schema::TYPE_DATETIME,
            // статус
            'status_id' => Schema::TYPE_BIGINT, /* в работе, доставлен, отменен итд */
            //адрес доставки
            'address_id' => Schema::TYPE_BIGINT,
            //контакт доставки
            'contact_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170317_130251_shipping_info cannot be reverted.\n";

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
