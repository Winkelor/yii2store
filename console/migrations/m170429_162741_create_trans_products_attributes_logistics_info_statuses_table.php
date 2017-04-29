<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trans_products_attributes_logistics_info_statuses`.
 * Has foreign keys to the tables:
 *
 * - `languages`
 * - `products_attributes_logistics_info_statuses`
 */
class m170429_162741_create_trans_products_attributes_logistics_info_statuses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('trans_products_attributes_logistics_info_statuses', [
            'id' => $this->primaryKey(),
            'lang_id' => $this->integer()->notNull(),
            'products_attributes_logistics_info_statuses_id' => $this->bigInteger(),
            'name' => $this->string(),
            'comment' => $this->string(),
        ]);

        // creates index for column `lang_id`
        $this->createIndex(
            'idx-trans_prod_att_log_inf_stlng',
            'trans_products_attributes_logistics_info_statuses',
            'lang_id'
        );

        // add foreign key for table `languages`
        $this->addForeignKey(
            'fk-trans_prod_att_log_inf_stlng',
            'trans_products_attributes_logistics_info_statuses',
            'lang_id',
            'languages',
            'id',
            'CASCADE'
        );

        // creates index for column `products_attributes_logistics_info_statuses_id`
        $this->createIndex(
            'idx-trans_prod_att_log_inf_st-prod_att_lis',
            'trans_products_attributes_logistics_info_statuses',
            'products_attributes_logistics_info_statuses_id'
        );

        // add foreign key for table `products_attributes_logistics_info_statuses`
        $this->addForeignKey(
            'fk-trans_prod_att_log_inf_st-prod_att_lis',
            'trans_products_attributes_logistics_info_statuses',
            'products_attributes_logistics_info_statuses_id',
            'products_attributes_logistics_info_statuses',
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
            'fk-trans_products_attributes_logistics_info_statuses-lang_id',
            'trans_products_attributes_logistics_info_statuses'
        );

        // drops index for column `lang_id`
        $this->dropIndex(
            'idx-trans_products_attributes_logistics_info_statuses-lang_id',
            'trans_products_attributes_logistics_info_statuses'
        );

        // drops foreign key for table `products_attributes_logistics_info_statuses`
        $this->dropForeignKey(
            'fk-trans_prod_att_log_inf_st-prod_att_lis',
            'trans_products_attributes_logistics_info_statuses'
        );

        // drops index for column `products_attributes_logistics_info_statuses_id`
        $this->dropIndex(
            'idx-trans_prod_att_log_inf_st-prod_att_lis',
            'trans_products_attributes_logistics_info_statuses'
        );

        $this->dropTable('trans_products_attributes_logistics_info_statuses');
    }
}
