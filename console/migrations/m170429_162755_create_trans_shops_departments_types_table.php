<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shops_departments_types`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shops_departments_types`
 */
class m170429_162755_create_trans_shops_departments_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shops_departments_types', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shops_departments_types_id' => $this->integer(),
            'name' => $this->string(),
            'comment' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shops_departments_types-lang_id',
            'trans_shops_departments_types',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shops_departments_types-lang_id',
            'trans_shops_departments_types',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shops_departments_types_id`
        $this->createIndex(
            'idx-trans_shops_de_tsdep_types',
            'trans_shops_departments_types',
            'shops_departments_types_id'
        );

        // add foreign key for table `shops_departments_types`
        $this->addForeignKey(
            'fk-trans_shops_de_tsdep_types',
            'trans_shops_departments_types',
            'shops_departments_types_id',
            'shops_departments_types',
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
            'fk-trans_shops_departments_types-lang_id',
            'trans_shops_departments_types'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shops_departments_types-lang_id',
            'trans_shops_departments_types'
        );

        // drops foreign key for table `shops_departments_types`
        $this->dropForeignKey(
            'fk-trans_shops_de_tsdep_types',
            'trans_shops_departments_types'
        );

        // drops index for column `shops_departments_types_id`
        $this->dropIndex(
            'idx-trans_shops_de_tsdep_types',
            'trans_shops_departments_types'
        );

        $this->dropTable('trans_shops_departments_types');
    }
}
