<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_wishlist`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `wishlist`
 */
class m170429_162805_create_trans_wishlist_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_wishlist', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'wishlist_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_wishlist-lang_id',
            'trans_wishlist',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_wishlist-lang_id',
            'trans_wishlist',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `wishlist_id`
        $this->createIndex(
            'idx-trans_wishlist-wishlist_id',
            'trans_wishlist',
            'wishlist_id'
        );

        // add foreign key for table `wishlist`
        $this->addForeignKey(
            'fk-trans_wishlist-wishlist_id',
            'trans_wishlist',
            'wishlist_id',
            'wishlist',
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
            'fk-trans_wishlist-lang_id',
            'trans_wishlist'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_wishlist-lang_id',
            'trans_wishlist'
        );

        // drops foreign key for table `wishlist`
        $this->dropForeignKey(
            'fk-trans_wishlist-wishlist_id',
            'trans_wishlist'
        );

        // drops index for column `wishlist_id`
        $this->dropIndex(
            'idx-trans_wishlist-wishlist_id',
            'trans_wishlist'
        );

        $this->dropTable('trans_wishlist');
    }
}
