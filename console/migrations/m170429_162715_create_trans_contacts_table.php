<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_contacts`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `contacts`
 */
class m170429_162715_create_trans_contacts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_contacts', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'contacts_id' => $this->bigInteger(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'second_phone' => $this->string(),
            'email' => $this->string(),
            'description' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_contacts-lang_id',
            'trans_contacts',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_contacts-lang_id',
            'trans_contacts',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `contacts_id`
        $this->createIndex(
            'idx-trans_contacts-contacts_id',
            'trans_contacts',
            'contacts_id'
        );

        // add foreign key for table `contacts`
        $this->addForeignKey(
            'fk-trans_contacts-contacts_id',
            'trans_contacts',
            'contacts_id',
            'contacts',
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
            'fk-trans_contacts-lang_id',
            'trans_contacts'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_contacts-lang_id',
            'trans_contacts'
        );

        // drops foreign key for table `contacts`
        $this->dropForeignKey(
            'fk-trans_contacts-contacts_id',
            'trans_contacts'
        );

        // drops index for column `contacts_id`
        $this->dropIndex(
            'idx-trans_contacts-contacts_id',
            'trans_contacts'
        );

        $this->dropTable('trans_contacts');
    }
}
