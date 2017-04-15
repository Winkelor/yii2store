<?php

use yii\db\Migration;
use yii\db\Schema;

// відділення магазину, як от велопланета має кілька відділень
class m170310_154736_shop_departments extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%shops_departments}}', [
            'id' => Schema::TYPE_BIGPK,
            'shop_id' => Schema::TYPE_BIGINT,
            'name' => Schema::TYPE_STRING,
            'short_name' => Schema::TYPE_STRING,
            'main_user_id' => Schema::TYPE_INTEGER, //backend user

            'type_id' => Schema::TYPE_INTEGER, //shops_types table, магазин, услуга, любой бизнесс короч
            'status_id' => Schema::TYPE_INTEGER, //shops_statuses table открыт закрыт итд

            // адреса і контакт департаменту
            'address_id' => Schema::TYPE_BIGINT,
            'contact_id' => Schema::TYPE_BIGINT,

            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m170310_154736_shop_departments cannot be reverted.\n";
        $this->dropTable('{{%shops_departments}}');
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
