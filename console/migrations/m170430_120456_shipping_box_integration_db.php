<?php

use yii\db\Migration;
use yii\db\Schema;

// ця міграція інтегрує shipping box в базу, ставить вторичні ключі, індекси, додає значення
class m170430_120456_shipping_box_integration_db extends Migration
{
    public $keys = [
        [
            'table_name' => '{{%shops_cultures}}',
            'column_name' => 'culture_id',
            'other_table_name' => '{{%cultures}}',
        ],

    ];

    public function up()
    {

        foreach ($this->keys as $k => $key)
        {
            $key['table_name'] = str_replace("{{%", "", $key['table_name']);
            $key['table_name'] = str_replace("}}", "", $key['table_name']);

            $column = str_replace("_id", "", $key['column_name']);
            $key['index_name'] = "idx_{$key['table_name']}__{$column}";
            $key['foreign_key_name'] = "fk_{$key['table_name']}__{$column}";

            $this->createIndex(
                $key['index_name'],
                $key['table_name'],
                $key['column_name']
            );
            
            $this->addForeignKey(
                $key['foreign_key_name'],
                $key['table_name'],
                $key['column_name'],
                $key['other_table_name'],
                'id',
                'CASCADE',
                'CASCADE'
            );
        }
    }

    public function down()
    {
        echo "m170430_120456_shipping_box_integration_db cannot be reverted.\n";

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
