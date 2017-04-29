<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_countries`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `countries`
 */
class m170429_162716_create_trans_countries_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_countries', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'countries_id' => $this->integer(),
            'en_name' => $this->string(),
            'native_name' => $this->string(),
            'iso_code' => $this->string(),
            'iso_short' => $this->string(),
            'iso_long' => $this->string(),
            'un_code' => $this->string(),
            'iso_3166-1_code' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_countries-lang_id',
            'trans_countries',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_countries-lang_id',
            'trans_countries',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `countries_id`
        $this->createIndex(
            'idx-trans_countries-countries_id',
            'trans_countries',
            'countries_id'
        );

        // add foreign key for table `countries`
        $this->addForeignKey(
            'fk-trans_countries-countries_id',
            'trans_countries',
            'countries_id',
            'countries',
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
            'fk-trans_countries-lang_id',
            'trans_countries'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_countries-lang_id',
            'trans_countries'
        );

        // drops foreign key for table `countries`
        $this->dropForeignKey(
            'fk-trans_countries-countries_id',
            'trans_countries'
        );

        // drops index for column `countries_id`
        $this->dropIndex(
            'idx-trans_countries-countries_id',
            'trans_countries'
        );

        $this->dropTable('trans_countries');
    }
}
