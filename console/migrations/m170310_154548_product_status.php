<?php

use yii\db\Migration;
use yii\db\Schema;

//статус товара, очікується, є, нема, і вся фігня
class m170310_154548_product_status extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        echo "m170310_154548_product_status cannot be reverted.\n";

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
