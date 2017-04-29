<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_global_categories`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `global_categories`
 */
class m170429_162724_create_trans_global_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_global_categories', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'global_categories_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_global_categories-lang_id',
            'trans_global_categories',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_global_categories-lang_id',
            'trans_global_categories',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `global_categories_id`
        $this->createIndex(
            'idx-trans_global_categories-global_categories_id',
            'trans_global_categories',
            'global_categories_id'
        );

        // add foreign key for table `global_categories`
        $this->addForeignKey(
            'fk-trans_global_categories-global_categories_id',
            'trans_global_categories',
            'global_categories_id',
            'global_categories',
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
            'fk-trans_global_categories-lang_id',
            'trans_global_categories'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_global_categories-lang_id',
            'trans_global_categories'
        );

        // drops foreign key for table `global_categories`
        $this->dropForeignKey(
            'fk-trans_global_categories-global_categories_id',
            'trans_global_categories'
        );

        // drops index for column `global_categories_id`
        $this->dropIndex(
            'idx-trans_global_categories-global_categories_id',
            'trans_global_categories'
        );

        $this->dropTable('trans_global_categories');
    }
}
