<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_usr_accounts_types`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `usr_accounts_types`
 */
class m170429_162803_create_trans_usr_accounts_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_usr_accounts_types', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'usr_accounts_types_id' => $this->integer(),
            'name' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_usr_accounts_types-lang_id',
            'trans_usr_accounts_types',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_usr_accounts_types-lang_id',
            'trans_usr_accounts_types',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `usr_accounts_types_id`
        $this->createIndex(
            'idx-trans_usr_accounts_types-usr_accounts_types_id',
            'trans_usr_accounts_types',
            'usr_accounts_types_id'
        );

        // add foreign key for table `usr_accounts_types`
        $this->addForeignKey(
            'fk-trans_usr_accounts_types-usr_accounts_types_id',
            'trans_usr_accounts_types',
            'usr_accounts_types_id',
            'usr_accounts_types',
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
            'fk-trans_usr_accounts_types-lang_id',
            'trans_usr_accounts_types'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_usr_accounts_types-lang_id',
            'trans_usr_accounts_types'
        );

        // drops foreign key for table `usr_accounts_types`
        $this->dropForeignKey(
            'fk-trans_usr_accounts_types-usr_accounts_types_id',
            'trans_usr_accounts_types'
        );

        // drops index for column `usr_accounts_types_id`
        $this->dropIndex(
            'idx-trans_usr_accounts_types-usr_accounts_types_id',
            'trans_usr_accounts_types'
        );

        $this->dropTable('trans_usr_accounts_types');
    }
}
