<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_image_types`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `image_types`
 */
class m170429_162727_create_trans_image_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_image_types', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'image_types_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_image_types-lang_id',
            'trans_image_types',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_image_types-lang_id',
            'trans_image_types',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `image_types_id`
        $this->createIndex(
            'idx-trans_image_types-image_types_id',
            'trans_image_types',
            'image_types_id'
        );

        // add foreign key for table `image_types`
        $this->addForeignKey(
            'fk-trans_image_types-image_types_id',
            'trans_image_types',
            'image_types_id',
            'image_types',
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
            'fk-trans_image_types-lang_id',
            'trans_image_types'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_image_types-lang_id',
            'trans_image_types'
        );

        // drops foreign key for table `image_types`
        $this->dropForeignKey(
            'fk-trans_image_types-image_types_id',
            'trans_image_types'
        );

        // drops index for column `image_types_id`
        $this->dropIndex(
            'idx-trans_image_types-image_types_id',
            'trans_image_types'
        );

        $this->dropTable('trans_image_types');
    }
}
