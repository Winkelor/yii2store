<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_order_comments`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `order_comments`
 */
class m170429_162732_create_trans_order_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_order_comments', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'order_comments_id' => $this->bigInteger(),
            'comment' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_order_comments-lang_id',
            'trans_order_comments',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_order_comments-lang_id',
            'trans_order_comments',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `order_comments_id`
        $this->createIndex(
            'idx-trans_order_comments-order_comments_id',
            'trans_order_comments',
            'order_comments_id'
        );

        // add foreign key for table `order_comments`
        $this->addForeignKey(
            'fk-trans_order_comments-order_comments_id',
            'trans_order_comments',
            'order_comments_id',
            'order_comments',
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
            'fk-trans_order_comments-lang_id',
            'trans_order_comments'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_order_comments-lang_id',
            'trans_order_comments'
        );

        // drops foreign key for table `order_comments`
        $this->dropForeignKey(
            'fk-trans_order_comments-order_comments_id',
            'trans_order_comments'
        );

        // drops index for column `order_comments_id`
        $this->dropIndex(
            'idx-trans_order_comments-order_comments_id',
            'trans_order_comments'
        );

        $this->dropTable('trans_order_comments');
    }
}
