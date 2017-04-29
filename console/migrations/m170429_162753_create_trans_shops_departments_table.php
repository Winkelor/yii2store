<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shops_departments`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shops_departments`
 */
class m170429_162753_create_trans_shops_departments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shops_departments', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shops_departments_id' => $this->bigInteger(),
            'name' => $this->string(),
            'short_name' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shops_departments-lang_id',
            'trans_shops_departments',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shops_departments-lang_id',
            'trans_shops_departments',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shops_departments_id`
        $this->createIndex(
            'idx-trans_shops_departments-shops_departments_id',
            'trans_shops_departments',
            'shops_departments_id'
        );

        // add foreign key for table `shops_departments`
        $this->addForeignKey(
            'fk-trans_shops_departments-shops_departments_id',
            'trans_shops_departments',
            'shops_departments_id',
            'shops_departments',
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
            'fk-trans_shops_departments-lang_id',
            'trans_shops_departments'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shops_departments-lang_id',
            'trans_shops_departments'
        );

        // drops foreign key for table `shops_departments`
        $this->dropForeignKey(
            'fk-trans_shops_departments-shops_departments_id',
            'trans_shops_departments'
        );

        // drops index for column `shops_departments_id`
        $this->dropIndex(
            'idx-trans_shops_departments-shops_departments_id',
            'trans_shops_departments'
        );

        $this->dropTable('trans_shops_departments');
    }
}
