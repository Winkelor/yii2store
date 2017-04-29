<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_attributes_groups`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `attributes_groups`
 */
class m170429_162655_create_trans_attributes_groups_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_attributes_groups', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'attributes_groups_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_attributes_groups-lang_id',
            'trans_attributes_groups',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_attributes_groups-lang_id',
            'trans_attributes_groups',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `attributes_groups_id`
        $this->createIndex(
            'idx-trans_attributes_groups-attributes_groups_id',
            'trans_attributes_groups',
            'attributes_groups_id'
        );

        // add foreign key for table `attributes_groups`
        $this->addForeignKey(
            'fk-trans_attributes_groups-attributes_groups_id',
            'trans_attributes_groups',
            'attributes_groups_id',
            'attributes_groups',
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
            'fk-trans_attributes_groups-lang_id',
            'trans_attributes_groups'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_attributes_groups-lang_id',
            'trans_attributes_groups'
        );

        // drops foreign key for table `attributes_groups`
        $this->dropForeignKey(
            'fk-trans_attributes_groups-attributes_groups_id',
            'trans_attributes_groups'
        );

        // drops index for column `attributes_groups_id`
        $this->dropIndex(
            'idx-trans_attributes_groups-attributes_groups_id',
            'trans_attributes_groups'
        );

        $this->dropTable('trans_attributes_groups');
    }
}
