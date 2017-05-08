<?php

use yii\db\Migration;
use yii\db\Schema;

class m170508_170932_fk_shop_countries extends Migration
{
    public $keys = [
        [
            'table_name' => '{{%shops}}',
            'column_name' => 'country_id',
            'other_table_name' => '{{%countries}}',
        ],

    ];
    public function up()
    {
        $this->addColumn('shops','country_id', Schema::TYPE_INTEGER);

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
        echo "m170508_170932_fk_shop_countries cannot be reverted.\n";

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
