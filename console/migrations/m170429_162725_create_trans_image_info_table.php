<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_image_info`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `image_info`
 */
class m170429_162725_create_trans_image_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_image_info', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'image_info_id' => $this->bigInteger(),
            'name' => $this->string(),
            'description' => $this->string(),
            'path' => $this->string(),
            'alternative_path' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_image_info-lang_id',
            'trans_image_info',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_image_info-lang_id',
            'trans_image_info',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `image_info_id`
        $this->createIndex(
            'idx-trans_image_info-image_info_id',
            'trans_image_info',
            'image_info_id'
        );

        // add foreign key for table `image_info`
        $this->addForeignKey(
            'fk-trans_image_info-image_info_id',
            'trans_image_info',
            'image_info_id',
            'image_info',
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
            'fk-trans_image_info-lang_id',
            'trans_image_info'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_image_info-lang_id',
            'trans_image_info'
        );

        // drops foreign key for table `image_info`
        $this->dropForeignKey(
            'fk-trans_image_info-image_info_id',
            'trans_image_info'
        );

        // drops index for column `image_info_id`
        $this->dropIndex(
            'idx-trans_image_info-image_info_id',
            'trans_image_info'
        );

        $this->dropTable('trans_image_info');
    }
}
