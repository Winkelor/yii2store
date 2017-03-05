<?php
/*
shops
-id // ключ
-name // ім'я
-short_name // коротке ім'я

-main_user_id // юзер що створив магазин
-legal_info_id // юридична інформація

-type_id // тип магазину
-status_id // статус магазину

-shop_config_id // налаштування магазину
-shop_seo_config_id // сео інфа магазину
-shop_commerce_data // комерційна інфа магазину

 */
use yii\db\Migration;

class m170305_140818_shops extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%shops}}', [
            'id' => $this->primaryKey(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        echo "m170305_140818_shops cannot be reverted.\n";

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
