<?php

use yii\db\Migration;
use yii\db\Schema;

// це просто вторичні ключі
class m180310_154800_foreign_keys_for_shops extends Migration
{
    public function up()
    {
        $Indexes = [
            'm170227_134053_user_client' => [
                'idx_user_client_account_type', // index name
                '{{%user_client}}', // table name
                'account_type_id' // column name
            ],
            1 => [

            ],
        ];

        $Foreign_keys = [
            'm170227_134053_user_client' => [
                'fk_user_client_account_type',
                '{{%user_client}}',
                'account_type_id',
                'usr_accounts_types',
                'id',
                'CASCADE'
            ],
            1 => [

            ],
        ];

//        $this->createIndex(
//            'idx_user_client_account_type',
//            '{{%user_client}}',
//            'account_type_id'
//        );
//
//        $this->addForeignKey(
//            'fk_user_client_account_type',
//            '{{%user_client}}',
//            'account_type_id',
//            'usr_accounts_types',
//            'id',
//            'CASCADE'
//        );
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
