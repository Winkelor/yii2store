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
                'index_name' => 'idx_user_client_account_type', // index name // m170227_134053_user_client
                'table_name' => '{{%user_client}}', // table name
                'column_name' => 'account_type_id', // column name
            ],
            //account_type_id
            [
                'index_name' => 'idx_user_admin_account_type', //see m170227_134054_user_admin
                'table_name' => '{{%user_admin}}',
                'column_name' => 'account_type_id',
            ],

            // SHOPS
            //main_user_id
            [
                'index_name' => 'idx_shops_main_user',
                'table_name' => '{{%shops}}',
                'column_name' => 'main_user_id',
            ],
            //type_id
            [
                'index_name' => 'idx_shops_type',
                'table_name' => '{{%shops}}',
                'column_name' => 'type_id',
            ],
            //status_id
            [
                'index_name' => 'idx_shops_status',
                'table_name' => '{{%shops}}',
                'column_name' => 'status_id',
            ],
            //address_id
            [
                'index_name' => 'idx_shops_address',
                'table_name' => '{{%shops}}',
                'column_name' => 'address_id',
            ],
            //contact_id
            [
                'index_name' => 'idx_shops_contact',
                'table_name' => '{{%shops}}',
                'column_name' => 'contact_id',
            ],

            // SEO INFO
            //shop_id
            [
                'index_name' => 'idx_seo_info',
                'table_name' => '{{%seo_info}}',
                'column_name' => 'shop_id',
            ],

            // DEPARTMENTS CONFIG
            //shop_id
            [
                'index_name' => 'idx_departments_config_shop',
                'table_name' => '{{%departments_config}}',
                'column_name' => 'shop_id',
            ],
            //department_id
            [
                'index_name' => 'idx_departments_config_department',
                'table_name' => '{{%departments_config}}',
                'column_name' => 'department_id',
            ],

            // SHOP CONFIG
            //shop_id
            [
                'index_name' => 'idx_shop_config_shop',
                'table_name' => '{{%shop_config}}',
                'column_name' => 'shop_id',
            ],

            // SHOP COMMERCE DATA
            //shop_id
            [
                'index_name' => 'idx_shops_commerce_data_shop',
                'table_name' => '{{%shops_commerce_data}}',
                'column_name' => 'shop_id',
            ],
            //department_id
            [
                'index_name' => 'idx_shops_commerce_data_department',
                'table_name' => '{{%shops_commerce_data}}',
                'column_name' => 'department_id',
            ],

        ];

        $Foreign_keys = [
            // USERS
            //account_type_id
            [
                'foreign_key_name' => 'fk_user_client_account_type', // fk name
                'table_name' => '{{%user_client}}', // table
                'account_type_id', // column
                'other_table_name' => '{{%usr_accounts_types}', // other table
                'other_table_key' => 'id', // key on other table
                'method' => 'CASCADE', // method
            ],
            //account_type_id
            [
                'foreign_key_name' => 'fk_user_admin_account_type',
                'table_name' => '{{%user_admin}}',
                'column_name' => 'account_type_id',
                'other_table_name' => '{{%usr_accounts_types}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHOPS
            //main_user_id
            [
                'foreign_key_name' => 'fk_shops_main_user',
                'table_name' => '{{%shops}}',
                'column_name' => 'main_user_id',
                'other_table_name' => '{{%user_admin}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //type_id
            [
                'foreign_key_name' => 'fk_shops_type',
                'table_name' => '{{%shops}}',
                'column_name' => 'type_id',
                'other_table_name' => '{{%shop_types}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //status_id
            [
                'foreign_key_name' => 'fk_shops_status',
                'table_name' => '{{%shops}}',
                'column_name' => 'status_id',
                'other_table_name' => '{{%shop_statuses}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //address_id
            [
                'foreign_key_name' => 'fk_shops_address',
                'table_name' => '{{%shops}}',
                'column_name' => 'address_id',
                'other_table_name' => '{{%addresses}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //contact_id
            [
                'foreign_key_name' => 'fk_shops_contact',
                'table_name' => '{{%shops}}',
                'column_name' => 'contact_id',
                'other_table_name' => '{{%contacts}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SEO INFO
            //shop_id
            [
                'foreign_key_name' => 'fk_seo_info',
                'table_name' => '{{%seo_info}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // DEPARTMENTS CONFIG
            //shop_id
            [
                'foreign_key_name' => 'fk_departments_config_shop',
                'table_name' => '{{%departments_config}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //department_id
            [
                'foreign_key_name' => 'fk_departments_config_department',
                'table_name' => '{{%departments_config}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHOP CONFIG
            //shop_id
            [
                'foreign_key_name' => 'fk_shop_config_shop',
                'table_name' => '{{%shop_config}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHOP COMMERCE DATA
            //shop_id
            [
                'foreign_key_name' => 'fk_shops_commerce_data_shop',
                'table_name' => '{{%shops_commerce_data}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //department_id
            [
                'foreign_key_name' => 'fk_shops_commerce_data_department',
                'table_name' => '{{%shops_commerce_data}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

        ];

//        $this->createIndex(
//            'index_name' => 'idx_user_client_account_type',
//            'table_name' => '{{%user_client}}',
//            'account_type_id'
//        );
//
//        $this->addForeignKey(
//            'foreign_key_name' => 'fk_user_client_account_type',
//            'table_name' => '{{%user_client}}',
//            'account_type_id',
//            'usr_accounts_types',
//            'other_table_key' => 'id',
//            'CASCADE'
//        );

//        foreach ()
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
