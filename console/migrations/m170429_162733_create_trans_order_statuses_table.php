<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_order_statuses`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `order_statuses`
 */
class m170429_162733_create_trans_order_statuses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_order_statuses', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'order_statuses_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_order_statuses-lang_id',
            'trans_order_statuses',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_order_statuses-lang_id',
            'trans_order_statuses',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `order_statuses_id`
        $this->createIndex(
            'idx-trans_order_statuses-order_statuses_id',
            'trans_order_statuses',
            'order_statuses_id'
        );

        // add foreign key for table `order_statuses`
        $this->addForeignKey(
            'fk-trans_order_statuses-order_statuses_id',
            'trans_order_statuses',
            'order_statuses_id',
            'order_statuses',
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
            'fk-trans_order_statuses-lang_id',
            'trans_order_statuses'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_order_statuses-lang_id',
            'trans_order_statuses'
        );

        // drops foreign key for table `order_statuses`
        $this->dropForeignKey(
            'fk-trans_order_statuses-order_statuses_id',
            'trans_order_statuses'
        );

        // drops index for column `order_statuses_id`
        $this->dropIndex(
            'idx-trans_order_statuses-order_statuses_id',
            'trans_order_statuses'
        );

        $this->dropTable('trans_order_statuses');
    }
}
