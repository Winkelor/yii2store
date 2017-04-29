<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_products`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `products`
 */
class m170429_162740_create_trans_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_products', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'products_id' => $this->bigInteger(),
            'vendor_code' => $this->string(),
            'name' => $this->string(),
            'short_description' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_products-lang_id',
            'trans_products',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_products-lang_id',
            'trans_products',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `products_id`
        $this->createIndex(
            'idx-trans_products-products_id',
            'trans_products',
            'products_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-trans_products-products_id',
            'trans_products',
            'products_id',
            'products',
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
            'fk-trans_products-lang_id',
            'trans_products'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_products-lang_id',
            'trans_products'
        );

        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-trans_products-products_id',
            'trans_products'
        );

        // drops index for column `products_id`
        $this->dropIndex(
            'idx-trans_products-products_id',
            'trans_products'
        );

        $this->dropTable('trans_products');
    }
}
