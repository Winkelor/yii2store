<?php

use yii\db\Migration;
use yii\db\Schema;

class m170317_005141_cart extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%cart}}', [
            'id' => Schema::TYPE_BIGPK,
            'user_client_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170317_005141_cart cannot be reverted.\n";
        $this->dropTable('{{%cart}}');
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
