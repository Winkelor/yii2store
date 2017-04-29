<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shop_types`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shop_types`
 */
class m170429_162749_create_trans_shop_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shop_types', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shop_types_id' => $this->integer(),
            'name' => $this->string(),
            'comment' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shop_types-lang_id',
            'trans_shop_types',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shop_types-lang_id',
            'trans_shop_types',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shop_types_id`
        $this->createIndex(
            'idx-trans_shop_types-shop_types_id',
            'trans_shop_types',
            'shop_types_id'
        );

        // add foreign key for table `shop_types`
        $this->addForeignKey(
            'fk-trans_shop_types-shop_types_id',
            'trans_shop_types',
            'shop_types_id',
            'shop_types',
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
            'fk-trans_shop_types-lang_id',
            'trans_shop_types'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shop_types-lang_id',
            'trans_shop_types'
        );

        // drops foreign key for table `shop_types`
        $this->dropForeignKey(
            'fk-trans_shop_types-shop_types_id',
            'trans_shop_types'
        );

        // drops index for column `shop_types_id`
        $this->dropIndex(
            'idx-trans_shop_types-shop_types_id',
            'trans_shop_types'
        );

        $this->dropTable('trans_shop_types');
    }
}
