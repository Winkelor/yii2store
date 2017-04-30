<?php

use yii\db\Migration;
use yii\db\Schema;

// ця міграція інтегрує shipping box в базу, ставить вторичні ключі, індекси, додає значення
class m170430_120456_shipping_box_integration_db extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        echo "m170430_120456_shipping_box_integration_db cannot be reverted.\n";

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
