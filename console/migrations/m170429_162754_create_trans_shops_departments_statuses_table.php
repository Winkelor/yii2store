<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_shops_departments_statuses`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `shops_departments_statuses`
 */
class m170429_162754_create_trans_shops_departments_statuses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_shops_departments_statuses', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'shops_departments_statuses_id' => $this->integer(),
            'name' => $this->string(),
            'comment' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_shops_departments_statuses-lang_id',
            'trans_shops_departments_statuses',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_shops_departments_statuses-lang_id',
            'trans_shops_departments_statuses',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `shops_departments_statuses_id`
        $this->createIndex(
            'idx-trans_shops_dep_statuses',
            'trans_shops_departments_statuses',
            'shops_departments_statuses_id'
        );

        // add foreign key for table `shops_departments_statuses`
        $this->addForeignKey(
            'fk-trans_shops_dep_statuses',
            'trans_shops_departments_statuses',
            'shops_departments_statuses_id',
            'shops_departments_statuses',
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
            'fk-trans_shops_departments_statuses-lang_id',
            'trans_shops_departments_statuses'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_shops_departments_statuses-lang_id',
            'trans_shops_departments_statuses'
        );

        // drops foreign key for table `shops_departments_statuses`
        $this->dropForeignKey(
            'fk-trans_shops_dep_statuses',
            'trans_shops_departments_statuses'
        );

        // drops index for column `shops_departments_statuses_id`
        $this->dropIndex(
            'idx-trans_shops_dep_statuses',
            'trans_shops_departments_statuses'
        );

        $this->dropTable('trans_shops_departments_statuses');
    }
}
