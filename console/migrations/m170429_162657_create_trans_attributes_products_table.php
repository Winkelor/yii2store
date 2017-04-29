<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_attributes_products`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `attributes_products`
 */
class m170429_162657_create_trans_attributes_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_attributes_products', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'attributes_products_id' => $this->bigInteger(),
            'value' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_attributes_products-lang_id',
            'trans_attributes_products',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_attributes_products-lang_id',
            'trans_attributes_products',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `attributes_products_id`
        $this->createIndex(
            'idx-trans_attributes_products-attributes_products_id',
            'trans_attributes_products',
            'attributes_products_id'
        );

        // add foreign key for table `attributes_products`
        $this->addForeignKey(
            'fk-trans_attributes_products-attributes_products_id',
            'trans_attributes_products',
            'attributes_products_id',
            'attributes_products',
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
            'fk-trans_attributes_products-lang_id',
            'trans_attributes_products'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_attributes_products-lang_id',
            'trans_attributes_products'
        );

        // drops foreign key for table `attributes_products`
        $this->dropForeignKey(
            'fk-trans_attributes_products-attributes_products_id',
            'trans_attributes_products'
        );

        // drops index for column `attributes_products_id`
        $this->dropIndex(
            'idx-trans_attributes_products-attributes_products_id',
            'trans_attributes_products'
        );

        $this->dropTable('trans_attributes_products');
    }
}
