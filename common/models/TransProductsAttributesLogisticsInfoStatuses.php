<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_products_attributes_logistics_info_statuses}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $products_attributes_logistics_info_statuses_id
 * @property string $name
 * @property string $comment
 *
 * @property ProductsAttributesLogisticsInfoStatuses $productsAttributesLogisticsInfoStatuses
 * @property Languages $lang
 */
class TransProductsAttributesLogisticsInfoStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_products_attributes_logistics_info_statuses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'products_attributes_logistics_info_statuses_id'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
            [['products_attributes_logistics_info_statuses_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsAttributesLogisticsInfoStatuses::className(), 'targetAttribute' => ['products_attributes_logistics_info_statuses_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translate', 'ID'),
            'lang_id' => Yii::t('translate', 'Lang ID'),
            'products_attributes_logistics_info_statuses_id' => Yii::t('translate', 'Products Attributes Logistics Info Statuses ID'),
            'name' => Yii::t('translate', 'Name'),
            'comment' => Yii::t('translate', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfoStatuses()
    {
        return $this->hasOne(ProductsAttributesLogisticsInfoStatuses::className(), ['id' => 'products_attributes_logistics_info_statuses_id'])->inverseOf('transProductsAttributesLogisticsInfoStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transProductsAttributesLogisticsInfoStatuses');
    }

    /**
     * @inheritdoc
     * @return TransProductsAttributesLogisticsInfoStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransProductsAttributesLogisticsInfoStatusesQuery(get_called_class());
    }
}
