<?php

use yii\db\Migration;
use yii\db\Schema;

// це просто вторичні ключі
class m170310_133403_foreign_keys_for_shops extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        echo "m170310_133403_foreign_keys_for_shops cannot be reverted.\n";

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
