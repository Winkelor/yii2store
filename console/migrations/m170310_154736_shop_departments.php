<?php

use yii\db\Migration;
use yii\db\Schema;

// відділення магазину, як от велопланета має кілька відділень
class m170310_154736_shop_departments extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        echo "m170310_154736_shop_departments cannot be reverted.\n";

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
