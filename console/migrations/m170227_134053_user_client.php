<?php
use yii\db\Schema;
use yii\db\Migration;

class m170227_134053_user_client extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_client}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'account_type_id' => Schema::TYPE_INTEGER,

            /*'is_seller' => $this->smallInteger()->notNull()->defaultValue(0), in admin acs */
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx_user_client_account_type',
            '{{%user_client}}',
            'account_type_id'
        );

        $this->addForeignKey(
            'fk_user_client_account_type',
            '{{%user_client}}',
            'account_type_id',
            'usr_accounts_types',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk_user_client-account_type',
            'account_type'
        );

        $this->dropIndex(
            'idx_user_client-account_type',
            'account_type'
        );

        $this->dropTable('{{%user_client}}');
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
