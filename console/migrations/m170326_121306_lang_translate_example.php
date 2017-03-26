<?php

use yii\db\Migration;
use yii\db\Schema;

/*
+переклад_продуктів
-ід
-мова_ід
-поле_продукту1
-поле_продукту2
-поле_продукту3
 */

// https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html
//замість example може бути будь яка таблиця

class m170326_121306_lang_translate_example extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%lang_translate_example}}', [
            'id' => Schema::TYPE_BIGPK,

            'language_id' => Schema::TYPE_STRING, // якщот реба різні країни, то це сама мова або en_us або en_uk

            'column_mame1' => Schema::TYPE_STRING,
            'column_mame2' => Schema::TYPE_STRING,
            'column_mame3' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);

    }

    public function down()
    {
        echo "m170326_121306_lang_translate_example cannot be reverted.\n";

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
