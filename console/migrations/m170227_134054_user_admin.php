<?php
use yii\db\Schema;
use yii\db\Migration;

// таблиця менеджера
class m170227_134054_user_admin extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'account_type_id' => Schema::TYPE_INTEGER,

            'status' => $this->smallInteger()->notNull()->defaultValue(10), // не чипать це самого її2
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

//        $this->createIndex(
//            'idx_user_admin_account_type',
//            '{{%user_admin}}',
//            'account_type_id'
//        );
//
//        $this->addForeignKey(
//            'fk_user_admin_account_type',
//            '{{%user_admin}}',
//            'account_type_id',
//            'usr_accounts_types',
//            'id',
//            'CASCADE'
//        );



        $this->insert('user_admin', [
            'username' => 'AntonBeletsky',
            'password_hash' => Yii::$app->security->generatePasswordHash('AntonBeletsky'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'email' => 'antonbeletskyeu@gmail.com',
            'created_at' => '0',
            'updated_at' => '0',
        ]);
    }

    public function down()
    {
//        $this->dropForeignKey(
//            'fk_user_admin_account_type',
//            'account_type'
//        );
//
//        $this->dropIndex(
//            'idx_user_admin_account_type',
//            'account_type'
//        );

        $this->dropTable('{{%user_admin}}');
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
