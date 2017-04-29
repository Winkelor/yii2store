<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shop_statuses`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shop_statuses`
 */
class m170429_162747_create_trans_shop_statuses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shop_statuses', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shop_statuses_id' => $this->integer(),
            'name' => $this->string(),
            'comment' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shop_statuses-lang_id',
            'trans_shop_statuses',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shop_statuses-lang_id',
            'trans_shop_statuses',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shop_statuses_id`
        $this->createIndex(
            'idx-trans_shop_statuses-shop_statuses_id',
            'trans_shop_statuses',
            'shop_statuses_id'
        );

        // add foreign key for table `shop_statuses`
        $this->addForeignKey(
            'fk-trans_shop_statuses-shop_statuses_id',
            'trans_shop_statuses',
            'shop_statuses_id',
            'shop_statuses',
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
            'fk-trans_shop_statuses-lang_id',
            'trans_shop_statuses'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shop_statuses-lang_id',
            'trans_shop_statuses'
        );

        // drops foreign key for table `shop_statuses`
        $this->dropForeignKey(
            'fk-trans_shop_statuses-shop_statuses_id',
            'trans_shop_statuses'
        );

        // drops index for column `shop_statuses_id`
        $this->dropIndex(
            'idx-trans_shop_statuses-shop_statuses_id',
            'trans_shop_statuses'
        );

        $this->dropTable('trans_shop_statuses');
    }
}
