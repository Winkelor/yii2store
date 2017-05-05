<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_orders`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `orders`
 */
class m170429_162735_create_trans_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_orders', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'orders_id' => $this->bigInteger(),
//            'order_user_id' => $this->string(), це номер заказу який можна поставить вручну
            'comment' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_orders-lang_id',
            'trans_orders',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_orders-lang_id',
            'trans_orders',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `orders_id`
        $this->createIndex(
            'idx-trans_orders-orders_id',
            'trans_orders',
            'orders_id'
        );

        // add foreign key for table `orders`
        $this->addForeignKey(
            'fk-trans_orders-orders_id',
            'trans_orders',
            'orders_id',
            'orders',
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
            'fk-trans_orders-lang_id',
            'trans_orders'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_orders-lang_id',
            'trans_orders'
        );

        // drops foreign key for table `orders`
        $this->dropForeignKey(
            'fk-trans_orders-orders_id',
            'trans_orders'
        );

        // drops index for column `orders_id`
        $this->dropIndex(
            'idx-trans_orders-orders_id',
            'trans_orders'
        );

        $this->dropTable('trans_orders');
    }
}
