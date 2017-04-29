<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shops_commerce_data`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shops_commerce_data`
 */
class m170429_162751_create_trans_shops_commerce_data_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shops_commerce_data', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shops_commerce_data_id' => $this->bigInteger(),
            'name' => $this->string(),
            'value' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shops_commerce_data-lang_id',
            'trans_shops_commerce_data',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shops_commerce_data-lang_id',
            'trans_shops_commerce_data',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shops_commerce_data_id`
        $this->createIndex(
            'idx-trans_shops_commerce_data-shops_commerce_data_id',
            'trans_shops_commerce_data',
            'shops_commerce_data_id'
        );

        // add foreign key for table `shops_commerce_data`
        $this->addForeignKey(
            'fk-trans_shops_commerce_data-shops_commerce_data_id',
            'trans_shops_commerce_data',
            'shops_commerce_data_id',
            'shops_commerce_data',
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
            'fk-trans_shops_commerce_data-lang_id',
            'trans_shops_commerce_data'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shops_commerce_data-lang_id',
            'trans_shops_commerce_data'
        );

        // drops foreign key for table `shops_commerce_data`
        $this->dropForeignKey(
            'fk-trans_shops_commerce_data-shops_commerce_data_id',
            'trans_shops_commerce_data'
        );

        // drops index for column `shops_commerce_data_id`
        $this->dropIndex(
            'idx-trans_shops_commerce_data-shops_commerce_data_id',
            'trans_shops_commerce_data'
        );

        $this->dropTable('trans_shops_commerce_data');
    }
}
