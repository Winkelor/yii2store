<?php

use yii\db\Migration;
use yii\db\Schema;
// http://www.yiiframework.com/doc-2.0/yii-db-migration.html
// це просто вторичні ключі
class m170410_123910_foreign_keys_for_shops extends Migration
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
                'index_name' => 'idx_shops_types',
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

            // GLOBAL CATEGORIES
            // parent_id
            [
                'index_name' => 'idx_global_categories_parent',
                'table_name' => '{{%global_categories}}',
                'column_name' => 'parent_id',
            ],

            // CATEGORIES
            // shop_id
            [
                'index_name' => 'idx_categories_shop',
                'table_name' => '{{%categories}}',
                'column_name' => 'shop_id',
            ],
            // global_category_id
            [
                'index_name' => 'idx_categories_global_category',
                'table_name' => '{{%categories}}',
                'column_name' => 'global_category_id',
            ],
            // parent_id
            [
                'index_name' => 'idx_categories_parent',
                'table_name' => '{{%categories}}',
                'column_name' => 'parent_id',
            ],
            // seo_id
            [
                'index_name' => 'idx_categories_seo',
                'table_name' => '{{%categories}}',
                'column_name' => 'seo_id',
            ],

            // PRODUCTS
            // shop_id
            [
                'index_name' => 'idx_products_shop',
                'table_name' => '{{%products}}',
                'column_name' => 'shop_id',
            ],
            // department_id
            [
                'index_name' => 'idx_products_department',
                'table_name' => '{{%products}}',
                'column_name' => 'department_id',
            ],
            // category_id
            [
                'index_name' => 'idx_products_category',
                'table_name' => '{{%products}}',
                'column_name' => 'category_id',
            ],
            // seo_id
            [
                'index_name' => 'idx_products_seo',
                'table_name' => '{{%products}}',
                'column_name' => 'seo_id',
            ],

            // ATTRIBUTES GROUPS
            // shop_id
            [
                'index_name' => 'idx_attributes_groups_shop',
                'table_name' => '{{%attributes_groups}}',
                'column_name' => 'shop_id',
            ],
            // category_id
            [
                'index_name' => 'idx_attributes_groups_category',
                'table_name' => '{{%attributes_groups}}',
                'column_name' => 'category_id',
            ],

            // ATTRIBUTES CATEGORIES
            // shop_id
            [
                'index_name' => 'idx_attributes_categories_shop',
                'table_name' => '{{%attributes_categories}}',
                'column_name' => 'shop_id',
            ],
            // category_id
            [
                'index_name' => 'idx_attributes_categories_category',
                'table_name' => '{{%attributes_categories}}',
                'column_name' => 'category_id',
            ],
            // attribute_type_id
            [
                'index_name' => 'idx_attributes_categories_type',
                'table_name' => '{{%attributes_categories}}',
                'column_name' => 'attribute_type_id',
            ],
            // attribute_group_id
            [
                'index_name' => 'idx_attributes_categories_group',
                'table_name' => '{{%attributes_categories}}',
                'column_name' => 'attribute_group_id',
            ],

            // ATTRIBUTES PRODUCTS
            // shop_id
            [
                'index_name' => 'idx_attributes_products_shop',
                'table_name' => '{{%attributes_products}}',
                'column_name' => 'shop_id',
            ],
            // department_id
            [
                'index_name' => 'idx_attributes_products_department',
                'table_name' => '{{%attributes_products}}',
                'column_name' => 'department_id',
            ],
            // product_id
            [
                'index_name' => 'idx_attributes_products_product',
                'table_name' => '{{%attributes_products}}',
                'column_name' => 'product_id',
            ],

            // PRODUCTS ATTRIBUTES LOGISTICS INFO
            // shop_id
            // department_id
            // product_id
            // status_id

            // ATTRIBUTES PRODUCTS GROUP
            // shop_id
            // department_id
            // product_id
            // products_attributes_logistics_inf_id
            // attributes_products_id
            // attributes_categories_id

            // SHOPS_DEPARTMENTS
            // shop_id
            // main_user_id
            // type_id
            // status_id
            // address_id
            // contact_id

            // PRODUCT_STATUS
            // shop_id
            // department_id
            // product_id

            // IMAGE_INFO
            // shop_id
            // image_type_id

            // IMAGE_INFO_GLOBAL_CATEGORIES
            // shop_id
            // image_info_id
            // global_categories_id

            // IMAGE_INFO_CATEGORIES
            // shop_id
            // image_info_id
            // categories_id


        ];

        $Foreign_keys = [
            // USERS
            //account_type_id
            [
                'foreign_key_name' => 'fk_user_client_account_type', // fk name
                'table_name' => '{{%user_client}}', // table
                'column_name' => 'account_type_id', // column
                'other_table_name' => '{{%usr_accounts_types}}', // other table
                'other_table_key' => 'id', // key on other table
                'method' => 'CASCADE', // method
            ],
            //account_type_id
            [
                'foreign_key_name' => 'fk_user_admin_account_type',
                'table_name' => '{{%user_admin}}',
                'column_name' => 'account_type_id',
                'other_table_name' => '{{%usr_accounts_types}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHOPS
            //main_user_id
            [
                'foreign_key_name' => 'fk_shops_main_user',
                'table_name' => '{{%shops}}',
                'column_name' => 'main_user_id',
                'other_table_name' => '{{%user_admin}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //type_id
            [
                'foreign_key_name' => 'fk_shops_types',
                'table_name' => '{{%shops}}',
                'column_name' => 'type_id',
                'other_table_name' => '{{%shop_types}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //status_id
            [
                'foreign_key_name' => 'fk_shops_status',
                'table_name' => '{{%shops}}',
                'column_name' => 'status_id',
                'other_table_name' => '{{%shop_statuses}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //address_id
            [
                'foreign_key_name' => 'fk_shops_address',
                'table_name' => '{{%shops}}',
                'column_name' => 'address_id',
                'other_table_name' => '{{%addresses}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //contact_id
            [
                'foreign_key_name' => 'fk_shops_contact',
                'table_name' => '{{%shops}}',
                'column_name' => 'contact_id',
                'other_table_name' => '{{%contacts}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SEO INFO
            //shop_id
            [
                'foreign_key_name' => 'fk_seo_info',
                'table_name' => '{{%seo_info}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // DEPARTMENTS CONFIG
            //shop_id
            [
                'foreign_key_name' => 'fk_departments_config_shop',
                'table_name' => '{{%departments_config}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //department_id
            [
                'foreign_key_name' => 'fk_departments_config_department',
                'table_name' => '{{%departments_config}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHOP CONFIG
            //shop_id
            [
                'foreign_key_name' => 'fk_shop_config_shop',
                'table_name' => '{{%shop_config}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHOP COMMERCE DATA
            //shop_id
            [
                'foreign_key_name' => 'fk_shops_commerce_data_shop',
                'table_name' => '{{%shops_commerce_data}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //department_id
            [
                'foreign_key_name' => 'fk_shops_commerce_data_department',
                'table_name' => '{{%shops_commerce_data}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // GLOBAL CATEGORIES
            // parent_id
            [
                'foreign_key_name' => 'fk_global_categories_parent',
                'table_name' => '{{%global_categories}}',
                'column_name' => 'parent_id',
                'other_table_name' => '{{%global_categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // CATEGORIES
            // shop_id
            [
                'foreign_key_name' => 'fk_categories_shop',
                'table_name' => '{{%categories}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // global_category_id
            [
                'foreign_key_name' => 'fk_categories_global_category',
                'table_name' => '{{%categories}}',
                'column_name' => 'global_category_id',
                'other_table_name' => '{{%categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // parent_id
            [
                'foreign_key_name' => 'fk_categories_parent',
                'table_name' => '{{%categories}}',
                'column_name' => 'parent_id',
                'other_table_name' => '{{%categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // seo_id
            [
                'foreign_key_name' => 'fk_categories_seo',
                'table_name' => '{{%categories}}',
                'column_name' => 'seo_id',
                'other_table_name' => '{{%seo_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // PRODUCTS
            // shop_id
            [
                'foreign_key_name' => 'fk_products_shop',
                'table_name' => '{{%products}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // department_id
            [
                'foreign_key_name' => 'fk_products_department',
                'table_name' => '{{%products}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // category_id
            [
                'foreign_key_name' => 'fk_products_category',
                'table_name' => '{{%products}}',
                'column_name' => 'category_id',
                'other_table_name' => '{{%categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // seo_id
            [
                'foreign_key_name' => 'fk_products_seo',
                'table_name' => '{{%products}}',
                'column_name' => 'seo_id',
                'other_table_name' => '{{%seo_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // ATTRIBUTES GROUPS
            // shop_id
            [
                'foreign_key_name' => 'fk_attributes_groups_shop',
                'table_name' => '{{%attributes_groups}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // category_id
            [
                'foreign_key_name' => 'fk_attributes_groups_category',
                'table_name' => '{{%attributes_groups}}',
                'column_name' => 'category_id',
                'other_table_name' => '{{%categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // ATTRIBUTES CATEGORIES
            // shop_id
            [
                'foreign_key_name' => 'fk_attributes_categories_shop',
                'table_name' => '{{%attributes_categories}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // category_id
            [
                'foreign_key_name' => 'fk_attributes_categories_category',
                'table_name' => '{{%attributes_categories}}',
                'column_name' => 'category_id',
                'other_table_name' => '{{%categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // attribute_type_id
            [
                'foreign_key_name' => 'fk_attributes_categories_type',
                'table_name' => '{{%attributes_categories}}',
                'column_name' => 'attribute_type_id',
                'other_table_name' => '{{%attributes_types}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // attribute_group_id
            [
                'foreign_key_name' => 'fk_attributes_categories_group',
                'table_name' => '{{%attributes_categories}}',
                'column_name' => 'attribute_group_id',
                'other_table_name' => '{{%attributes_groups}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // ATTRIBUTES PRODUCTS
            // shop_id
            [
                'foreign_key_name' => 'fk_attributes_products_shop',
                'table_name' => '{{%attributes_products}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // department_id
            [
                'foreign_key_name' => 'fk_attributes_products_department',
                'table_name' => '{{%attributes_products}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // product_id
            [
                'foreign_key_name' => 'fk_attributes_products_product',
                'table_name' => '{{%attributes_products}}',
                'column_name' => 'product_id',
                'other_table_name' => '{{%products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

        ];

        foreach ($Indexes as $k => $index)
            $this->createIndex(
                $index['index_name'],
                $index['table_name'],
                $index['column_name']
            );

        foreach ($Foreign_keys as $k => $foreign_key)
            $this->addForeignKey(
                $foreign_key['foreign_key_name'],
                $foreign_key['table_name'],
                $foreign_key['column_name'],
                $foreign_key['other_table_name'],
                $foreign_key['other_table_key'],
                $foreign_key['method']
            );

//        $this->addForeignKey(
//'fk_shops_types',
//'{{%shops}}',
//'type_id',
//'{{%shop_types}}',
//'id',
//'CASCADE'
//        );

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
