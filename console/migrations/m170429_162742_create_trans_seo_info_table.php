<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_seo_info`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `seo_info`
 */
class m170429_162742_create_trans_seo_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_seo_info', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'seo_info_id' => $this->bigInteger(),
            'meta_header' => $this->string(),
            'meta_description' => $this->string(),
            'human_readable_url' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_seo_info-lang_id',
            'trans_seo_info',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_seo_info-lang_id',
            'trans_seo_info',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `seo_info_id`
        $this->createIndex(
            'idx-trans_seo_info-seo_info_id',
            'trans_seo_info',
            'seo_info_id'
        );

        // add foreign key for table `seo_info`
        $this->addForeignKey(
            'fk-trans_seo_info-seo_info_id',
            'trans_seo_info',
            'seo_info_id',
            'seo_info',
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
            'fk-trans_seo_info-lang_id',
            'trans_seo_info'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_seo_info-lang_id',
            'trans_seo_info'
        );

        // drops foreign key for table `seo_info`
        $this->dropForeignKey(
            'fk-trans_seo_info-seo_info_id',
            'trans_seo_info'
        );

        // drops index for column `seo_info_id`
        $this->dropIndex(
            'idx-trans_seo_info-seo_info_id',
            'trans_seo_info'
        );

        $this->dropTable('trans_seo_info');
    }
}
