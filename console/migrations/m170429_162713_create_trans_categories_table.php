<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_categories`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `categories`
 */
class m170429_162713_create_trans_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_categories', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'categories_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_categories-lang_id',
            'trans_categories',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_categories-lang_id',
            'trans_categories',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `categories_id`
        $this->createIndex(
            'idx-trans_categories-categories_id',
            'trans_categories',
            'categories_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-trans_categories-categories_id',
            'trans_categories',
            'categories_id',
            'categories',
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
            'fk-trans_categories-lang_id',
            'trans_categories'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_categories-lang_id',
            'trans_categories'
        );

        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-trans_categories-categories_id',
            'trans_categories'
        );

        // drops index for column `categories_id`
        $this->dropIndex(
            'idx-trans_categories-categories_id',
            'trans_categories'
        );

        $this->dropTable('trans_categories');
    }
}
