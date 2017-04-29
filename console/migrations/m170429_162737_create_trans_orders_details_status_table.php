<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_orders_details_status`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `orders_details_status`
 */
class m170429_162737_create_trans_orders_details_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_orders_details_status', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'orders_details_status_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_orders_details_status-lang_id',
            'trans_orders_details_status',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_orders_details_status-lang_id',
            'trans_orders_details_status',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `orders_details_status_id`
        $this->createIndex(
            'idx-trans_orders_details_status-orders_details_status_id',
            'trans_orders_details_status',
            'orders_details_status_id'
        );

        // add foreign key for table `orders_details_status`
        $this->addForeignKey(
            'fk-trans_orders_details_status-orders_details_status_id',
            'trans_orders_details_status',
            'orders_details_status_id',
            'orders_details_status',
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
            'fk-trans_orders_details_status-lang_id',
            'trans_orders_details_status'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_orders_details_status-lang_id',
            'trans_orders_details_status'
        );

        // drops foreign key for table `orders_details_status`
        $this->dropForeignKey(
            'fk-trans_orders_details_status-orders_details_status_id',
            'trans_orders_details_status'
        );

        // drops index for column `orders_details_status_id`
        $this->dropIndex(
            'idx-trans_orders_details_status-orders_details_status_id',
            'trans_orders_details_status'
        );

        $this->dropTable('trans_orders_details_status');
    }
}
