<?php

use yii\db\Migration;
use yii\db\Schema;

// картинка
class m170312_132047_image_info extends Migration
{
    public function up()
    {
        $tableOptions = null;

        $this->createTable('{{%image_info}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            // обложка, мініатюра, мініатюра меню, мобільна, тощо
            'image_type_id' => Schema::TYPE_BIGINT, // зробить це як ід?

            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,

            'path' => Schema::TYPE_STRING,
            'alternative_path' => Schema::TYPE_STRING, // нп нема пікчі товару, сує якусь стандартну пікчу

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170312_132047_image_info cannot be reverted.\n";
        $this->dropTable('{{%image_info}}');
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
