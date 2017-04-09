<?php
use yii\db\Schema;
use yii\db\Migration;

// типи акаутів
class m170227_134052_usr_accounts_types extends Migration
{
    public function up()
    {
        $this->createTable('usr_accounts_types', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            // allow for frontend
            'frontend' => Schema::TYPE_BOOLEAN,
            // allow for backend
            'backend' => Schema::TYPE_BOOLEAN,
        ]);

        $this->insert('usr_accounts_types', [
            'name' => 'winkelor_admin',
            'description' => 'winkelor back office admin',
            'frontend' => false,
            'backend' => true,
        ]);

        $this->insert('usr_accounts_types', [
            'name' => 'winkelor_manager',
            'description' => 'winkelor back office manager',
            'frontend' => false,
            'backend' => true,
        ]);

        $this->insert('usr_accounts_types', [
            /* Admin for shop */
            'name' => 'client_seller',
            'description' => 'it shop',
            'frontend' => false,
            'backend' => true,
        ]);

        $this->insert('usr_accounts_types', [
            /* shopper */
            'name' => 'client_customer',
            'description' => 'shopper',
            'frontend' => true,
            'backend' => false,
        ]);
    }

    public function down()
    {
        $this->dropTable('usr_accounts_types');

        echo "m170227_134052_usr_accounts_types cannot be reverted.\n";

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
