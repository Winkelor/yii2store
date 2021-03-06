<?php

use yii\db\Migration;
use yii\db\Schema;

class m170317_005127_orders extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%orders}}', [
            'id' => Schema::TYPE_BIGPK,
            //ід користувача ORDER # 305-9848180-5927520 (не допускать в перекладі)
            'order_user_id' => Schema::TYPE_STRING,
            'shop_id' => Schema::TYPE_BIGINT,
            'department_id' => Schema::TYPE_BIGINT, /* optional */
            // сума цін товарів замовлення
            'total_price' => Schema::TYPE_DECIMAL,
            'currency_id' => Schema::TYPE_BIGINT, /* валюта закріплюється, що  б при зміні валюти не було збою*/

            // коментар до замовлення
            'comment' => Schema::TYPE_STRING,
            //покупець
            'user_client_id' => Schema::TYPE_BIGINT,
//            //shipping info
            'shipping_info_id' => Schema::TYPE_BIGINT,

            // статус замовлення
            'status_id' => Schema::TYPE_BIGINT, /* в работе, доставлен, отменен итд */

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170317_005127_orders cannot be reverted.\n";
        $this->dropTable('{{%orders}}');
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
