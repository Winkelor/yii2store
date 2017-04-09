<?php

use yii\db\Migration;
use yii\db\Schema;

//категорії товарів
class m170305_152041_categories extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%categories}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,

            // є атегорії вінкілор, а є категорії магазину,
            // якщо магазин копіює категорії вінкілор,
            // то його категорія вказує на глобальну
            'global_category_id' => Schema::TYPE_BIGINT,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            'parent_id' => Schema::TYPE_BIGINT,
            // рівень вкладеності
            'level_depth' => Schema::TYPE_INTEGER,

            // img is many to many

            //показувати чи ні
            'is_active' => Schema::TYPE_BOOLEAN,

            //seo на shops_seo
            'seo_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170305_152041_categories cannot be reverted.\n";

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
