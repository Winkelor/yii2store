<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_currencies`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `currencies`
 */
class m170429_162720_create_trans_currencies_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_currencies', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'currencies_id' => $this->bigInteger(),
            'name' => $this->string(),
            'short_name' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_currencies-lang_id',
            'trans_currencies',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_currencies-lang_id',
            'trans_currencies',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `currencies_id`
        $this->createIndex(
            'idx-trans_currencies-currencies_id',
            'trans_currencies',
            'currencies_id'
        );

        // add foreign key for table `currencies`
        $this->addForeignKey(
            'fk-trans_currencies-currencies_id',
            'trans_currencies',
            'currencies_id',
            'currencies',
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
            'fk-trans_currencies-lang_id',
            'trans_currencies'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_currencies-lang_id',
            'trans_currencies'
        );

        // drops foreign key for table `currencies`
        $this->dropForeignKey(
            'fk-trans_currencies-currencies_id',
            'trans_currencies'
        );

        // drops index for column `currencies_id`
        $this->dropIndex(
            'idx-trans_currencies-currencies_id',
            'trans_currencies'
        );

        $this->dropTable('trans_currencies');
    }
}
