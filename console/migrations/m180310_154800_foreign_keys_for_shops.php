<?php

use yii\db\Migration;
use yii\db\Schema;
// http://www.yiiframework.com/doc-2.0/yii-db-migration.html
// це просто вторичні ключі
class m180310_154800_foreign_keys_for_shops extends Migration
{
    public function up()
    {
        // name idx fk
        // table
        //column

        $Indexes = [
            // USERS
            //account_type_id
            [
                'idx_user_client_account_type', // index name // m170227_134053_user_client
                '{{%user_client}}', // table name
                'account_type_id', // column name
            ],
            //account_type_id
            [
                'idx_user_admin_account_type', //see m170227_134054_user_admin
                '{{%user_admin}}',
                'account_type_id',
            ],

            // SHOPS
            //main_user_id
            [
                'idx_shops_main_user',
                '{{%shops}}',
                'main_user_id',
            ],
            //type_id
            [
                'idx_shops_type',
                '{{%shops}}',
                'type_id',
            ],
            //status_id
            [
                'idx_shops_status',
                '{{%shops}}',
                'status_id',
            ],
            //address_id
            [
                'idx_shops_address',
                '{{%shops}}',
                'address_id',
            ],
            //contact_id
            [
                'idx_shops_contact',
                '{{%shops}}',
                'contact_id',
            ],

            // SEO INFO
            //shop_id
            [
                'idx_seo_info',
                '{{%seo_info}}',
                'shop_id',
            ],

            // DEPARTMENTS CONFIG
            //shop_id
            [
                'idx_departments_config_shop',
                '{{%departments_config}}',
                'shop_id',
            ],
            //department_id
            [
                'idx_departments_config_department',
                '{{%departments_config}}',
                'department_id',
            ],

            // SHOP CONFIG
            //shop_id
            [
                'idx_shop_config_shop',
                '{{%shop_config}}',
                'shop_id',
            ],

            // SHOP COMMERCE DATA
            //shop_id
            [
                'idx_shops_commerce_data_shop',
                '{{%shops_commerce_data}}',
                'shop_id',
            ],
            //department_id
            [
                'idx_shops_commerce_data_department',
                '{{%shops_commerce_data}}',
                'department_id',
            ],

        ];

        $Foreign_keys = [
            // USERS
            //account_type_id
            [
                'fk_user_client_account_type', // fk name
                '{{%user_client}}', // table
                'account_type_id', // column
                'usr_accounts_types', // other table
                'id', // key on other table
                'CASCADE', // method
            ],
            //account_type_id
            [
                'fk_user_admin_account_type',
                '{{%user_admin}}',
                'account_type_id',
                'usr_accounts_types',
                'id',
                'CASCADE',
            ],

            // SHOPS
            //main_user_id
            [
                'fk_shops_main_user',
                '{{%shops}}',
                'main_user_id',
                'user_admin',
                'id',
                'CASCADE',
            ],
            //type_id
            [
                'fk_shops_type',
                '{{%shops}}',
                'type_id',
                'shop_types',
                'id',
                'CASCADE',
            ],
            //status_id
            [
                'fk_shops_status',
                '{{%shops}}',
                'status_id',
                'shop_statuses',
                'id',
                'CASCADE',
            ],
            //address_id
            [
                'fk_shops_address',
                '{{%shops}}',
                'address_id',
                'addresses',
                'id',
                'CASCADE',
            ],
            //contact_id
            [
                'fk_shops_contact',
                '{{%shops}}',
                'contact_id',
                'contacts',
                'id',
                'CASCADE',
            ],

            // SEO INFO
            //shop_id

            // DEPARTMENTS CONFIG
            //shop_id
            //department_id

            // SHOP CONFIG
            //shop_id

            // SHOP COMMERCE DATA
            //shop_id
            //department_id

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
