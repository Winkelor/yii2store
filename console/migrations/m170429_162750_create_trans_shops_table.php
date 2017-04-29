<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shops`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shops`
 */
class m170429_162750_create_trans_shops_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shops', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shops_id' => $this->bigInteger(),
            'name' => $this->string(),
            'short_name' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shops-lang_id',
            'trans_shops',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shops-lang_id',
            'trans_shops',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shops_id`
        $this->createIndex(
            'idx-trans_shops-shops_id',
            'trans_shops',
            'shops_id'
        );

        // add foreign key for table `shops`
        $this->addForeignKey(
            'fk-trans_shops-shops_id',
            'trans_shops',
            'shops_id',
            'shops',
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
            'fk-trans_shops-lang_id',
            'trans_shops'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shops-lang_id',
            'trans_shops'
        );

        // drops foreign key for table `shops`
        $this->dropForeignKey(
            'fk-trans_shops-shops_id',
            'trans_shops'
        );

        // drops index for column `shops_id`
        $this->dropIndex(
            'idx-trans_shops-shops_id',
            'trans_shops'
        );

        $this->dropTable('trans_shops');
    }
}
