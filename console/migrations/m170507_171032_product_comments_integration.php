<?php

use yii\db\Migration;

class m170507_171032_product_comments_integration extends Migration
{
    public $keys = [

        [
            'table_name' => '{{%comment_status}}',
            'column_name' => 'shop_id',
            'other_table_name' => '{{%shops}}',
        ],
        [
            'table_name' => '{{%comment_status}}',
            'column_name' => 'department_id',
            'other_table_name' => '{{%shops_departments}}',
        ],
        [
            'table_name' => '{{%comment_status}}',
            'column_name' => 'product_id',
            'other_table_name' => '{{%products}}',
        ],
        [
            'table_name' => '{{%comment_status}}',
            'column_name' => 'user_client_id',
            'other_table_name' => '{{%user_client}}',
        ],
        [
            'table_name' => '{{%comment_status}}',
            'column_name' => 'parent_id',
            'other_table_name' => '{{%comment_status}}',
        ],
        [
            'table_name' => '{{%comment_status}}',
            'column_name' => 'status_id',
            'other_table_name' => '{{%comment_status}}',
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
        echo "m170507_171032_product_comments_integration cannot be reverted.\n";

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
