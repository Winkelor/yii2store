<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_attributes_types`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `attributes_types`
 */
class m170429_162705_create_trans_attributes_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_attributes_types', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'attributes_types_id' => $this->bigInteger(),
            'name' => $this->string(),
            'db_type' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_attributes_types-lang_id',
            'trans_attributes_types',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_attributes_types-lang_id',
            'trans_attributes_types',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `attributes_types_id`
        $this->createIndex(
            'idx-trans_attributes_types-attributes_types_id',
            'trans_attributes_types',
            'attributes_types_id'
        );

        // add foreign key for table `attributes_types`
        $this->addForeignKey(
            'fk-trans_attributes_types-attributes_types_id',
            'trans_attributes_types',
            'attributes_types_id',
            'attributes_types',
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
            'fk-trans_attributes_types-lang_id',
            'trans_attributes_types'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_attributes_types-lang_id',
            'trans_attributes_types'
        );

        // drops foreign key for table `attributes_types`
        $this->dropForeignKey(
            'fk-trans_attributes_types-attributes_types_id',
            'trans_attributes_types'
        );

        // drops index for column `attributes_types_id`
        $this->dropIndex(
            'idx-trans_attributes_types-attributes_types_id',
            'trans_attributes_types'
        );

        $this->dropTable('trans_attributes_types');
    }
}
