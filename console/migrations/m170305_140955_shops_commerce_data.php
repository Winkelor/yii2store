<?php
//комерційна інформація магазину

use yii\db\Migration;
use yii\db\Schema;

// інформація про фізичну / юридичну особу, тощо
class m170305_140955_shops_commerce_data extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%shops_commerce_data}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGPK,
            // буває так шо кожен департамент - окрема юр особа
            'department_id' => Schema::TYPE_BIGPK, /* optional */

            'name' => Schema::TYPE_STRING,
            'value' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'text' => Schema::TYPE_TEXT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_140955_shops_commerce_data cannot be reverted.\n";

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
