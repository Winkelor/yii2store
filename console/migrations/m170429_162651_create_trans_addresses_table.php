<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_addresses`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `addresses`
 */
class m170429_162651_create_trans_addresses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_addresses', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'addresses_id' => $this->bigInteger(),
            'name' => $this->string(),
            'comment' => $this->string(),
            'phone' => $this->string(),
            'street' => $this->string(),
            'build' => $this->string(),
            'apartments' => $this->string(),
            'city' => $this->string(),
            'region' => $this->string(),
            'state' => $this->string(),
            'post_index' => $this->string(),
            'country' => $this->string(),
            'security_access_code' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_addresses-lang_id',
            'trans_addresses',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_addresses-lang_id',
            'trans_addresses',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `addresses_id`
        $this->createIndex(
            'idx-trans_addresses-addresses_id',
            'trans_addresses',
            'addresses_id'
        );

        // add foreign key for table `addresses`
        $this->addForeignKey(
            'fk-trans_addresses-addresses_id',
            'trans_addresses',
            'addresses_id',
            'addresses',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `languages`
        $this->dropForeignKey(
            'fk-trans_addresses-lang_id',
            'trans_addresses'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_addresses-lang_id',
            'trans_addresses'
        );

        // drops foreign key for table `addresses`
        $this->dropForeignKey(
            'fk-trans_addresses-addresses_id',
            'trans_addresses'
        );

        // drops index for column `addresses_id`
        $this->dropIndex(
            'idx-trans_addresses-addresses_id',
            'trans_addresses'
        );

        $this->dropTable('trans_addresses');
    }
}
