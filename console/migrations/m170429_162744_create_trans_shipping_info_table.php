<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shipping_info`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shipping_info`
 */
class m170429_162744_create_trans_shipping_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shipping_info', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shipping_info_id' => $this->bigInteger(),
            'post_tracker' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shipping_info-lang_id',
            'trans_shipping_info',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shipping_info-lang_id',
            'trans_shipping_info',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shipping_info_id`
        $this->createIndex(
            'idx-trans_shipping_info-shipping_info_id',
            'trans_shipping_info',
            'shipping_info_id'
        );

        // add foreign key for table `shipping_info`
        $this->addForeignKey(
            'fk-trans_shipping_info-shipping_info_id',
            'trans_shipping_info',
            'shipping_info_id',
            'shipping_info',
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
            'fk-trans_shipping_info-lang_id',
            'trans_shipping_info'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shipping_info-lang_id',
            'trans_shipping_info'
        );

        // drops foreign key for table `shipping_info`
        $this->dropForeignKey(
            'fk-trans_shipping_info-shipping_info_id',
            'trans_shipping_info'
        );

        // drops index for column `shipping_info_id`
        $this->dropIndex(
            'idx-trans_shipping_info-shipping_info_id',
            'trans_shipping_info'
        );

        $this->dropTable('trans_shipping_info');
    }
}
