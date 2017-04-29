<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_attributes_categories`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `attributes_categories`
 */
class m170429_162654_create_trans_attributes_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_attributes_categories', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'attributes_categories_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_attributes_categories-lang_id',
            'trans_attributes_categories',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_attributes_categories-lang_id',
            'trans_attributes_categories',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `attributes_categories_id`
        $this->createIndex(
            'idx-trans_attributes_categories-attributes_categories_id',
            'trans_attributes_categories',
            'attributes_categories_id'
        );

        // add foreign key for table `attributes_categories`
        $this->addForeignKey(
            'fk-trans_attributes_categories-attributes_categories_id',
            'trans_attributes_categories',
            'attributes_categories_id',
            'attributes_categories',
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
            'fk-trans_attributes_categories-lang_id',
            'trans_attributes_categories'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_attributes_categories-lang_id',
            'trans_attributes_categories'
        );

        // drops foreign key for table `attributes_categories`
        $this->dropForeignKey(
            'fk-trans_attributes_categories-attributes_categories_id',
            'trans_attributes_categories'
        );

        // drops index for column `attributes_categories_id`
        $this->dropIndex(
            'idx-trans_attributes_categories-attributes_categories_id',
            'trans_attributes_categories'
        );

        $this->dropTable('trans_attributes_categories');
    }
}
