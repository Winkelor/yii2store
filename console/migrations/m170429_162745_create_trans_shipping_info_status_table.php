<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shipping_info_status`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shipping_info_status`
 */
class m170429_162745_create_trans_shipping_info_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shipping_info_status', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shipping_info_status_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shipping_info_status-lang_id',
            'trans_shipping_info_status',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shipping_info_status-lang_id',
            'trans_shipping_info_status',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shipping_info_status_id`
        $this->createIndex(
            'idx-trans_shipping_info_status-shipping_info_status_id',
            'trans_shipping_info_status',
            'shipping_info_status_id'
        );

        // add foreign key for table `shipping_info_status`
        $this->addForeignKey(
            'fk-trans_shipping_info_status-shipping_info_status_id',
            'trans_shipping_info_status',
            'shipping_info_status_id',
            'shipping_info_status',
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
            'fk-trans_shipping_info_status-lang_id',
            'trans_shipping_info_status'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shipping_info_status-lang_id',
            'trans_shipping_info_status'
        );

        // drops foreign key for table `shipping_info_status`
        $this->dropForeignKey(
            'fk-trans_shipping_info_status-shipping_info_status_id',
            'trans_shipping_info_status'
        );

        // drops index for column `shipping_info_status_id`
        $this->dropIndex(
            'idx-trans_shipping_info_status-shipping_info_status_id',
            'trans_shipping_info_status'
        );

        $this->dropTable('trans_shipping_info_status');
    }
}
