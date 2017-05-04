<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shipping_info_status}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShippingInfo[] $shippingInfos
 * @property TransShippingInfoStatus[] $transShippingInfoStatuses
 */
class ShippingInfoStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shipping_info_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shipping_info_status', 'ID'),
            'name' => Yii::t('shipping_info_status', 'Name'),
            'description' => Yii::t('shipping_info_status', 'Description'),
            'is_active' => Yii::t('shipping_info_status', 'Is Active'),
            'created_at' => Yii::t('shipping_info_status', 'Created At'),
            'updated_at' => Yii::t('shipping_info_status', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingInfos()
    {
        return $this->hasMany(ShippingInfo::className(), ['status_id' => 'id'])->inverseOf('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShippingInfoStatuses()
    {
        return $this->hasMany(TransShippingInfoStatus::className(), ['shipping_info_status_id' => 'id'])->inverseOf('shippingInfoStatus');
    }

    /**
     * @inheritdoc
     * @return ShippingInfoStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShippingInfoStatusQuery(get_called_class());
    }
}
