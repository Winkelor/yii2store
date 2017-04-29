<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_cultures`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `cultures`
 */
class m170429_162718_create_trans_cultures_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_cultures', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'cultures_id' => $this->bigInteger(),
            'language_culture_name' => $this->string(),
            'display_ame' => $this->string(),
            'culture_code' => $this->string(),
            'ISO_639x_value' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_cultures-lang_id',
            'trans_cultures',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_cultures-lang_id',
            'trans_cultures',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `cultures_id`
        $this->createIndex(
            'idx-trans_cultures-cultures_id',
            'trans_cultures',
            'cultures_id'
        );

        // add foreign key for table `cultures`
        $this->addForeignKey(
            'fk-trans_cultures-cultures_id',
            'trans_cultures',
            'cultures_id',
            'cultures',
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
            'fk-trans_cultures-lang_id',
            'trans_cultures'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_cultures-lang_id',
            'trans_cultures'
        );

        // drops foreign key for table `cultures`
        $this->dropForeignKey(
            'fk-trans_cultures-cultures_id',
            'trans_cultures'
        );

        // drops index for column `cultures_id`
        $this->dropIndex(
            'idx-trans_cultures-cultures_id',
            'trans_cultures'
        );

        $this->dropTable('trans_cultures');
    }
}
