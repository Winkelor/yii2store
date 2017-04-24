<?php

use yii\db\Migration;
use yii\db\Schema;
// http://www.yiiframework.com/doc-2.0/yii-db-migration.html
// це просто вторичні ключі
class m170501_000000_foreign_keys_for_shops extends Migration
{
    public $indexes = [];
    public $foreign_keys = [];
    public $separator = "__";


    public function up()
    {
        // name idx fk
        // table
        //column

        $this->indexes = [
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
            [
                'index_name' => 'idx_products_attributes_logistics_info_shop',
                'table_name' => '{{%products_attributes_logistics_info}}',
                'column_name' => 'shop_id',
            ],
            // department_id
            [
                'index_name' => 'idx_products_attributes_logistics_info_department',
                'table_name' => '{{%products_attributes_logistics_info}}',
                'column_name' => 'department_id',
            ],
            // product_id
            [
                'index_name' => 'idx_products_attributes_logistics_info_product',
                'table_name' => '{{%products_attributes_logistics_info}}',
                'column_name' => 'product_id',
            ],
            // status_id
            [
                'index_name' => 'idx_products_attributes_logistics_info_status',
                'table_name' => '{{%products_attributes_logistics_info}}',
                'column_name' => 'status_id',
            ],

            // ATTRIBUTES PRODUCTS GROUP
            // shop_id
            [
                'index_name' => 'idx_attributes_products_group_shop',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'shop_id',
            ],
            // department_id
            [
                'index_name' => 'idx_attributes_products_group_department',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'department_id',
            ],
            // product_id
            [
                'index_name' => 'idx_attributes_products_group_product',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'product_id',
            ],
            // products_attributes_logistics_inf_id
            [
                'index_name' => 'idx_attributes_products_group_products_attributes_logistics_inf',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'products_attributes_logistics_inf_id',
            ],
            // attribute_product_id
            [
                'index_name' => 'idx_attributes_products_group_attribute_product',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'attribute_product_id',
            ],
            // attribute_category_id
            [
                'index_name' => 'idx_attributes_products_group_attribute_category',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'attribute_category_id',
            ],

            // SHOPS_DEPARTMENTS
            // shop_id
            [
                'index_name' => 'idx_shops_departments_shop',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'shop_id',
            ],
            // main_user_id
            [
                'index_name' => 'idx_shops_departments_main_user',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'main_user_id',
            ],
            // type_id
            [
                'index_name' => 'idx_shops_departments_type',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'type_id',
            ],
            // status_id
            [
                'index_name' => 'idx_shops_departments_status',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'status_id',
            ],
            // address_id
            [
                'index_name' => 'idx_shops_departments_address',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'address_id',
            ],
            // contact_id
            [
                'index_name' => 'idx_shops_departments_contact',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'contact_id',
            ],

            // PRODUCT_STATUS
            // shop_id
            [
                'index_name' => 'idx_product_status_shop',
                'table_name' => '{{%product_status}}',
                'column_name' => 'shop_id',
            ],
            // department_id
            [
                'index_name' => 'idx_product_status_department',
                'table_name' => '{{%product_status}}',
                'column_name' => 'department_id',
            ],
            // product_id
            [
                'index_name' => 'idx_product_status_product',
                'table_name' => '{{%product_status}}',
                'column_name' => 'product_id',
            ],

            // IMAGE_INFO
            // shop_id
            [
                'index_name' => 'idx_image_info_shop',
                'table_name' => '{{%image_info}}',
                'column_name' => 'shop_id',
            ],
            // image_type_id
            [
                'index_name' => 'idx_image_info_image_type',
                'table_name' => '{{%image_info}}',
                'column_name' => 'image_type_id',
            ],

            // IMAGE_INFO_GLOBAL_CATEGORIES
            // shop_id
            [
                'index_name' => 'idx_image_info_global_categories_shop',
                'table_name' => '{{%image_info_global_categories}}',
                'column_name' => 'shop_id',
            ],
            // image_info_id
            [
                'index_name' => 'idx_image_info_global_categories_image_info',
                'table_name' => '{{%image_info_global_categories}}',
                'column_name' => 'image_info_id',
            ],
            // global_category_id
            [
                'index_name' => 'idx_image_info_global_categories_global_category',
                'table_name' => '{{%image_info_global_categories}}',
                'column_name' => 'global_category_id',
            ],

            // IMAGE_INFO_CATEGORIES
            // shop_id
            [
                'index_name' => 'idx_image_info_categories_shop',
                'table_name' => '{{%image_info_categories}}',
                'column_name' => 'shop_id',
            ],
            // image_info_id
            [
                'index_name' => 'idx_image_info_categories_image_info',
                'table_name' => '{{%image_info_categories}}',
                'column_name' => 'image_info_id',
            ],
            // category_id
            [
                'index_name' => 'idx_image_info_categories_category',
                'table_name' => '{{%image_info_categories}}',
                'column_name' => 'category_id',
            ],

            // IMAGE_INFO_PRODUCTS
            // shop_id
            [
                'index_name' => 'idx_image_info_products_shop',
                'table_name' => '{{%image_info_products}}',
                'column_name' => 'shop_id',
            ],
            // image_info_id
            [
                'index_name' => 'idx_image_info_products_image_info)',
                'table_name' => '{{%image_info_products}}',
                'column_name' => 'image_info_id',
            ],
            // product_id
            [
                'index_name' => 'idx_image_info_products_product',
                'table_name' => '{{%image_info_products}}',
                'column_name' => 'product_id',
            ],

            // IMAGE_INFO_ATTRIBUTES_PRODUCTS
            // shop_id
            [
                'index_name' => 'idx_image_info_attributes_products_shop',
                'table_name' => '{{%image_info_attributes_products}}',
                'column_name' => 'shop_id',
            ],
            // image_info_id
            [
                'index_name' => 'idx_image_info_attributes_products_image_info',
                'table_name' => '{{%image_info_attributes_products}}',
                'column_name' => 'image_info_id',
            ],
            // attribute_product_id
            [
                'index_name' => 'idx_image_info_attributes_products_attribute_product',
                'table_name' => '{{%image_info_attributes_products}}',
                'column_name' => 'attribute_product_id',
            ],

            // WISHLIST
            // user_client_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%wishlist}}',
                'column_name' => 'user_client_id',
            ],

            // ORDERS

            // shop_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders}}',
                'column_name' => 'shop_id',
            ],
            //'department_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders}}',
                'column_name' => 'department_id',
            ],
            //'currency_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders}}',
                'column_name' => 'currency_id',
            ],
            //'user_client_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders}}',
                'column_name' => 'user_client_id',
            ],
            //'shipping_info_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders}}',
                'column_name' => 'shipping_info_id',
            ],
            //'status_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders}}',
                'column_name' => 'status_id',
            ],

            // CART
            // 'user_client_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart}}',
                'column_name' => 'user_client_id',
            ],

            // WISHLIST_DETAILS
            //'shop_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'shop_id',
            ],
            //'department_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'department_id',
            ],
            //'product_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'product_id',
            ],
            //'products_attributes_logistics_info_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'products_attributes_logistics_info_id',
            ],
            //'attributes_products_group_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'attributes_products_group_id',
            ],
            //'wishlist_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'wishlist_id',
            ],
            //'user_client_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'user_client_id',
            ],

            // ORDERS_DETAILS
            //'shop_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'shop_id',
            ],
            //'department_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'department_id',
            ],
            //'product_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'product_id',
            ],
            //'products_attributes_logistics_info_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'products_attributes_logistics_info_id',
            ],
            //'attributes_products_group_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'attributes_products_group_id',
            ],
            //'order_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'order_id',
            ],
            //'currency_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'currency_id',
            ],
            //'status_id' // створить міграцію
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'status_id',
            ],
            //'user_client_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'user_client_id',
            ],

            // CART_DETAILS
            //'shop_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'shop_id',
            ],
            //'department_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'department_id',
            ],
            //'product_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'product_id',
            ],
            //'products_attributes_logistics_info_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'products_attributes_logistics_info_id',
            ],
            //'attributes_products_group_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'attributes_products_group_id',
            ],
            //'cart_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'cart_id',
            ],
            //'status_id' // створить міграцію
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'status_id',
            ],
            //'user_client_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'user_client_id',
            ],

            // SHIPPING_INFO
            //'status_id' // створить міграцію
            [
                'index_name' => 'idx_',
                'table_name' => '{{%shipping_info}}',
                'column_name' => 'status_id',
            ],
            //'address_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%shipping_info}}',
                'column_name' => 'address_id',
            ],
            //'contact_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%shipping_info}}',
                'column_name' => 'contact_id',
            ],

            // CULTURES
            //language_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cultures}}',
                'column_name' => 'language_id',
            ],
            //country_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%cultures}}',
                'column_name' => 'country_id',
            ],

            // CURRENCIES
            //language_id
            [
                'index_name' => 'idx_',
                'table_name' => '{{%currencies}}',
                'column_name' => 'shop_id',
            ],

            // ORDER_COMMENTS
            //'shop_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%order_comments}}',
                'column_name' => 'shop_id',
            ],
            //'department_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%order_comments}}',
                'column_name' => 'department_id',
            ],
            //'order_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%order_comments}}',
                'column_name' => 'order_id',
            ],
            //'manager_id'
            [
                'index_name' => 'idx_',
                'table_name' => '{{%order_comments}}',
                'column_name' => 'manager_id',
            ],

            // SHOPS_CULTURES
            [
                'index_name' => 'idx_',
                'table_name' => '{{%shops_cultures}}',
                'column_name' => 'shop_id',
            ],

            [
                'index_name' => 'idx_',
                'table_name' => '{{%shops_cultures}}',
                'column_name' => 'culture_id',
            ],

            //







        ];

        $this->foreign_keys = [
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
                'foreign_key_name' => 'fk_shops_type',
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
                'other_table_name' => '{{%global_categories}}',
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

            // PRODUCTS ATTRIBUTES LOGISTICS INFO
            // shop_id
            [
                'foreign_key_name' => 'fk_products_attributes_logistics_info_shop',
                'table_name' => '{{%products_attributes_logistics_info}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // department_id
            [
                'foreign_key_name' => 'fk_products_attributes_logistics_info_department',
                'table_name' => '{{%products_attributes_logistics_info}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // product_id
            [
                'foreign_key_name' => 'fk_products_attributes_logistics_info_product',
                'table_name' => '{{%products_attributes_logistics_info}}',
                'column_name' => 'product_id',
                'other_table_name' => '{{%products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // status_id
            [
                'foreign_key_name' => 'fk_products_attributes_logistics_info_status',
                'table_name' => '{{%products_attributes_logistics_info}}',
                'column_name' => 'status_id',
                'other_table_name' => '{{%products_attributes_logistics_info_statuses}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // ATTRIBUTES PRODUCTS GROUP
            // shop_id
            [
                'foreign_key_name' => 'fk_attributes_products_group_shop',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // department_id
            [
                'foreign_key_name' => 'fk_attributes_products_group_department',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // product_id
            [
                'foreign_key_name' => 'fk_attributes_products_group_product',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'product_id',
                'other_table_name' => '{{%products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // products_attributes_logistics_inf_id
            [
                'foreign_key_name' => 'fk_attributes_products_group_products_attributes_logistics_inf',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'products_attributes_logistics_inf_id',
                'other_table_name' => '{{%products_attributes_logistics_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // attribute_product_id
            [
                'foreign_key_name' => 'fk_attributes_products_group_attribute_product',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'attribute_product_id',
                'other_table_name' => '{{%attributes_products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // attribute_category_id
            [
                'foreign_key_name' => 'fk_attributes_products_group_attribute_category',
                'table_name' => '{{%attributes_products_group}}',
                'column_name' => 'attribute_category_id',
                'other_table_name' => '{{%attributes_categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHOPS_DEPARTMENTS
            // shop_id
            [
                'foreign_key_name' => 'fk_shops_departments_shop',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // main_user_id
            [
                'foreign_key_name' => 'fk_shops_departments_main_user',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'main_user_id',
                'other_table_name' => '{{%user_admin}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // type_id
            [
                'foreign_key_name' => 'fk_shops_departments_type',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'type_id',
                'other_table_name' => '{{%shops_departments_types}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // status_id
            [
                'foreign_key_name' => 'fk_shops_departments_status',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'status_id',
                'other_table_name' => '{{%shops_departments_statuses}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // address_id
            [
                'foreign_key_name' => 'fk_shops_departments_address',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'address_id',
                'other_table_name' => '{{%addresses}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // contact_id
            [
                'foreign_key_name' => 'fk_shops_departments_contact',
                'table_name' => '{{%shops_departments}}',
                'column_name' => 'contact_id',
                'other_table_name' => '{{%contacts}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // PRODUCT_STATUS
            // shop_id
            [
                'foreign_key_name' => 'fk_product_status_shop',
                'table_name' => '{{%product_status}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // department_id
            [
                'foreign_key_name' => 'fk_product_status_department',
                'table_name' => '{{%product_status}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // product_id
            [
                'foreign_key_name' => 'fk_product_status_product',
                'table_name' => '{{%product_status}}',
                'column_name' => 'product_id',
                'other_table_name' => '{{%products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // IMAGE_INFO
            // shop_id
            [
                'foreign_key_name' => 'fk_image_info_shop',
                'table_name' => '{{%image_info}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // image_type_id
            [
                'foreign_key_name' => 'fk_image_info_image_type',
                'table_name' => '{{%image_info}}',
                'column_name' => 'image_type_id',
                'other_table_name' => '{{%image_types}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // IMAGE_INFO_GLOBAL_CATEGORIES
            // shop_id
            [
                'foreign_key_name' => 'fk_image_info_global_categories_shop',
                'table_name' => '{{%image_info_global_categories}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // image_info_id
            [
                'foreign_key_name' => 'fk_image_info_global_categories_image_info',
                'table_name' => '{{%image_info_global_categories}}',
                'column_name' => 'image_info_id',
                'other_table_name' => '{{%image_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // global_category_id
            [
                'foreign_key_name' => 'fk_image_info_global_categories_global_category',
                'table_name' => '{{%image_info_global_categories}}',
                'column_name' => 'global_category_id',
                'other_table_name' => '{{%global_categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // IMAGE_INFO_CATEGORIES
            // shop_id
            [
                'foreign_key_name' => 'fk_image_info_categories_shop',
                'table_name' => '{{%image_info_categories}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // image_info_id
            [
                'foreign_key_name' => 'fk_image_info_categories_image_info',
                'table_name' => '{{%image_info_categories}}',
                'column_name' => 'image_info_id',
                'other_table_name' => '{{%image_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // category_id
            [
                'foreign_key_name' => 'fk_image_info_categories_category',
                'table_name' => '{{%image_info_categories}}',
                'column_name' => 'category_id',
                'other_table_name' => '{{%categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // IMAGE_INFO_PRODUCTS
            // shop_id
            [
                'foreign_key_name' => 'fk_image_info_products_shop',
                'table_name' => '{{%image_info_products}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // image_info_id
            [
                'foreign_key_name' => 'fk_image_info_products_image_info',
                'table_name' => '{{%image_info_products}}',
                'column_name' => 'image_info_id',
                'other_table_name' => '{{%image_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // product_id
            [
                'foreign_key_name' => 'fk_image_info_products_product',
                'table_name' => '{{%image_info_products}}',
                'column_name' => 'product_id',
                'other_table_name' => '{{%products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // IMAGE_INFO_ATTRIBUTES_PRODUCTS
            // shop_id
            [
                'foreign_key_name' => 'fk_image_info_attributes_products_shop',
                'table_name' => '{{%image_info_attributes_products}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // image_info_id
            [
                'foreign_key_name' => 'fk_image_info_attributes_products_image_info',
                'table_name' => '{{%image_info_attributes_products}}',
                'column_name' => 'image_info_id',
                'other_table_name' => '{{%image_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            // attribute_product_id
            [
                'foreign_key_name' => 'fk_image_info_attributes_products_attribute_product',
                'table_name' => '{{%image_info_attributes_products}}',
                'column_name' => 'attribute_product_id',
                'other_table_name' => '{{%attributes_products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // WISHLIST
            // user_client_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%wishlist}}',
                'column_name' => 'user_client_id',
                'other_table_name' => '{{%user_client}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // ORDERS
            // shop_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'department_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'currency_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders}}',
                'column_name' => 'currency_id',
                'other_table_name' => '{{%currencies}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'user_client_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders}}',
                'column_name' => 'user_client_id',
                'other_table_name' => '{{%user_client}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'shipping_info_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders}}',
                'column_name' => 'shipping_info_id',
                'other_table_name' => '{{%shipping_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'status_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders}}',
                'column_name' => 'status_id',
                'other_table_name' => '{{%order_statuses}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // CART
            // 'user_client_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart}}',
                'column_name' => 'user_client_id',
                'other_table_name' => '{{%user_client}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // WISHLIST_DETAILS
            //'shop_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'department_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'product_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'product_id',
                'other_table_name' => '{{%products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'products_attributes_logistics_info_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'products_attributes_logistics_info_id',
                'other_table_name' => '{{%products_attributes_logistics_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'attributes_products_group_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'attributes_products_group_id',
                'other_table_name' => '{{%attributes_products_group}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'wishlist_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'wishlist_id',
                'other_table_name' => '{{%wishlist}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'user_client_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%wishlist_details}}',
                'column_name' => 'user_client_id',
                'other_table_name' => '{{%user_client}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // ORDERS_DETAILS
            //'shop_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'department_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'product_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'product_id',
                'other_table_name' => '{{%products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'products_attributes_logistics_info_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'products_attributes_logistics_info_id',
                'other_table_name' => '{{%products_attributes_logistics_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'attributes_products_group_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'attributes_products_group_id',
                'other_table_name' => '{{%attributes_products_group}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'order_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'order_id',
                'other_table_name' => '{{%orders_details}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'currency_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'currency_id',
                'other_table_name' => '{{%currencies}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'status_id' // створить міграцію
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'status_id',
                'other_table_name' => '{{%orders_details_status}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'user_client_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%orders_details}}',
                'column_name' => 'user_client_id',
                'other_table_name' => '{{%user_client}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // CART_DETAILS
            //'shop_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'department_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'product_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'product_id',
                'other_table_name' => '{{%products}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'products_attributes_logistics_info_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'products_attributes_logistics_info_id',
                'other_table_name' => '{{%products_attributes_logistics_info}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'attributes_products_group_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'attributes_products_group_id',
                'other_table_name' => '{{%attributes_products_group}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'cart_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'cart_id',
                'other_table_name' => '{{%attributes_products_group}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'status_id' // створить міграцію
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'status_id',
                'other_table_name' => '{{%cart_details_status}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'user_client_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cart_details}}',
                'column_name' => 'user_client_id',
                'other_table_name' => '{{%user_client}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHIPPING_INFO
            //'status_id' // створить міграцію
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%shipping_info}}',
                'column_name' => 'status_id',
                'other_table_name' => '{{%shipping_info_status}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'address_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%shipping_info}}',
                'column_name' => 'address_id',
                'other_table_name' => '{{%addresses}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'contact_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%shipping_info}}',
                'column_name' => 'contact_id',
                'other_table_name' => '{{%contacts}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],


            //CURRENCIES
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%currencies}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // CULTURES
            //language_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cultures}}',
                'column_name' => 'language_id',
                'other_table_name' => '{{%languages}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //country_id
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%cultures}}',
                'column_name' => 'country_id',
                'other_table_name' => '{{%countries}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // ORDER_COMMENTS
            //'shop_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%order_comments}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'department_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%order_comments}}',
                'column_name' => 'department_id',
                'other_table_name' => '{{%shops_departments}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'order_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%order_comments}}',
                'column_name' => 'order_id',
                'other_table_name' => '{{%orders}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
            //'manager_id'
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%order_comments}}',
                'column_name' => 'manager_id',
                'other_table_name' => '{{%user_admin}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            // SHOPS_CULTURES
            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%shops_cultures}}',
                'column_name' => 'shop_id',
                'other_table_name' => '{{%shops}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

            [
                'foreign_key_name' => 'fk_',
                'table_name' => '{{%shops_cultures}}',
                'column_name' => 'culture_id',
                'other_table_name' => '{{%cultures}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

        ];

        foreach ($this->indexes as $k => $index) {
            $column = str_replace("_id", "", $index['column_name']);
            $temp_table_name = str_replace("{{%", "", $index['table_name']);
            $temp_table_name = str_replace("}}", "", $temp_table_name);
            $index['index_name'] = "idx_{$temp_table_name}__{$column}";

            $this->createIndex(
                $index['index_name'],
                $index['table_name'],
                $index['column_name']
            );
        }

        foreach ($this->foreign_keys as $k => $foreign_key)
        {
            $column = str_replace("_id", "", $foreign_key['column_name']);
            $temp_table_name = str_replace("{{%", "", $foreign_key['table_name']);
            $temp_table_name = str_replace("}}", "", $temp_table_name);
            $foreign_key['foreign_key_name'] = "fk_{$temp_table_name}__{$column}";

            $this->addForeignKey(
                $foreign_key['foreign_key_name'],
                $foreign_key['table_name'],
                $foreign_key['column_name'],
                $foreign_key['other_table_name'],
                $foreign_key['other_table_key'],
                $foreign_key['method']
            );
        }


    }

    public function down()
    {
        echo "m170310_133403_foreign_keys_for_shops cannot be reverted.\n";

        foreach ($this->Foreign_keys as $k => $foreign_key)
            $this->dropForeignKey(
                $foreign_key['foreign_key_name'],
                $foreign_key['table_name']
            );

        foreach ($this->indexes as $k => $index)
            $this->dropIndex(
                $index['index_name'],
                $index['table_name']
            );

//        $this->dropForeignKey(
            //'fk_user_client_account_type',
            //'account_type'
//        );
//
//        $this->dropIndex(
            //'idx_user_client_account_type',
            //'account_type'
//        );
//
//        $this->dropForeignKey(
            //'fk_user_admin_account_type',
            //'account_type'
//        );
//
//        $this->dropIndex(
            //'idx_user_admin_account_type',
            //'account_type'
//        );

        
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
