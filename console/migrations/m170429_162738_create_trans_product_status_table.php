<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_product_status`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `product_status`
 */
class m170429_162738_create_trans_product_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_product_status', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'product_status_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_product_status-lang_id',
            'trans_product_status',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_product_status-lang_id',
            'trans_product_status',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `product_status_id`
        $this->createIndex(
            'idx-trans_product_status-product_status_id',
            'trans_product_status',
            'product_status_id'
        );

        // add foreign key for table `product_status`
        $this->addForeignKey(
            'fk-trans_product_status-product_status_id',
            'trans_product_status',
            'product_status_id',
            'product_status',
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
            'fk-trans_product_status-lang_id',
            'trans_product_status'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_product_status-lang_id',
            'trans_product_status'
        );

        // drops foreign key for table `product_status`
        $this->dropForeignKey(
            'fk-trans_product_status-product_status_id',
            'trans_product_status'
        );

        // drops index for column `product_status_id`
        $this->dropIndex(
            'idx-trans_product_status-product_status_id',
            'trans_product_status'
        );

        $this->dropTable('trans_product_status');
    }
}
