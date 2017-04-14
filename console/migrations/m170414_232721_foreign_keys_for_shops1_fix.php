<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `news`.
 */
class m170414_232721_foreign_keys_for_shops1_fix extends Migration
{
    public function up()
    {
        $Foreign_keys = [
//             SHOPS
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
//            contact_id
            [
                'foreign_key_name' => 'fk_shops_contact',
                'table_name' => '{{%shops}}',
                'column_name' => 'contact_id',
                'other_table_name' => '{{%contacts}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],

//             PRODUCTS
            // category_id
            [
                'foreign_key_name' => 'fk_products_category',
                'table_name' => '{{%products}}',
                'column_name' => 'category_id',
                'other_table_name' => '{{%categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
//             ATTRIBUTES GROUPS
            // category_id
            [
                'foreign_key_name' => 'fk_attributes_groups_category',
                'table_name' => '{{%attributes_groups}}',
                'column_name' => 'category_id',
                'other_table_name' => '{{%categories}}',
                'other_table_key' => 'id',
                'method' => 'CASCADE',
            ],
        ];

        foreach ($Foreign_keys as $k => $foreign_key)
            $this->addForeignKey(
                $foreign_key['foreign_key_name'],
                $foreign_key['table_name'],
                $foreign_key['column_name'],
                $foreign_key['other_table_name'],
                $foreign_key['other_table_key'],
                $foreign_key['method']
            );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
