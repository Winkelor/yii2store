<?php

use yii\db\Migration;
use yii\db\Schema;


class m170511_095052_add_active_shop_to_user_admin extends Migration
{
    public $keys = [
        [
            'table_name' => '{{%user_admin}}',
            'column_name' => 'active_shop_id',
            'other_table_name' => '{{%shops}}',
        ],
    ];
    public function up()
    {
        $this->addColumn('user_admin','active_shop_id', Schema::TYPE_BIGINT);

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
        echo "m170511_095052_add_active_shop_to_user_admin cannot be reverted.\n";

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
