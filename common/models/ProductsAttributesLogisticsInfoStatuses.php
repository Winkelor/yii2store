<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%products_attributes_logistics_info_statuses}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ProductsAttributesLogisticsInfo[] $productsAttributesLogisticsInfos
 * @property TransProductsAttributesLogisticsInfoStatuses[] $transProductsAttributesLogisticsInfoStatuses
 */
class ProductsAttributesLogisticsInfoStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products_attributes_logistics_info_statuses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('products_attributes_logistics_info_statuses', 'ID'),
            'name' => Yii::t('products_attributes_logistics_info_statuses', 'Name'),
            'comment' => Yii::t('products_attributes_logistics_info_statuses', 'Comment'),
            'created_at' => Yii::t('products_attributes_logistics_info_statuses', 'Created At'),
            'updated_at' => Yii::t('products_attributes_logistics_info_statuses', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfos()
    {
        return $this->hasMany(ProductsAttributesLogisticsInfo::className(), ['status_id' => 'id'])->inverseOf('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransProductsAttributesLogisticsInfoStatuses()
    {
        return $this->hasMany(TransProductsAttributesLogisticsInfoStatuses::className(), ['products_attributes_logistics_info_statuses_id' => 'id'])->inverseOf('productsAttributesLogisticsInfoStatuses');
    }

    /**
     * @inheritdoc
     * @return ProductsAttributesLogisticsInfoStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsAttributesLogisticsInfoStatusesQuery(get_called_class());
    }
}
