<?php

use yii\db\Migration;
use yii\db\Schema;
// http://www.yiiframework.com/doc-2.0/yii-db-migration.html
// це просто вторичні ключі
class m180310_154800_foreign_keys_for_shops extends Migration
{
    public function up()
    {
        $Indexes = [
            [
                'idx_user_client_account_type', // index name
                '{{%user_client}}', // table name
                'account_type_id' // column name
            ],
            [
                'idx_user_admin_account_type',
                '{{%user_admin}}',
                'account_type_id'
            ],
        ];

        $Foreign_keys = [
            [
                'fk_user_client_account_type',
                '{{%user_client}}',
                'account_type_id',
                'usr_accounts_types',
                'id',
                'CASCADE'
            ],
            [
                'fk_user_admin_account_type',
                '{{%user_admin}}',
                'account_type_id',
                'usr_accounts_types',
                'id',
                'CASCADE'
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

        $this->dropForeignKey(
            'fk_user_client_account_type',
            'account_type'
        );

        $this->dropIndex(
            'idx_user_client_account_type',
            'account_type'
        );

        $this->dropForeignKey(
            'fk_user_admin_account_type',
            'account_type'
        );

        $this->dropIndex(
            'idx_user_admin_account_type',
            'account_type'
        );

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
