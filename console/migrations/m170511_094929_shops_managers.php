<?php

use yii\db\Migration;
use yii\db\Schema;

// таблиця що зв'язує магазини і всіх хто в ньому працює
class m170511_094929_shops_managers extends Migration
{
    public $keys = [
        [
            'table_name' => '{{%shops_managers}}',
            'column_name' => 'shop_id',
            'other_table_name' => '{{%shops}}',
        ],
        [
            'table_name' => '{{%shops_managers}}',
            'column_name' => 'manager_id',
            'other_table_name' => '{{%user_admin}}',
        ],
    ];

    public function up()
    {
        $tableOptions = null;
        $this->createTable('{{%shops_managers}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'manager_id' => Schema::TYPE_BIGINT,
            'comment' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        foreach ($this->keys as $k => $key) {
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
        echo "m170511_094929_shops_managers cannot be reverted.\n";

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
