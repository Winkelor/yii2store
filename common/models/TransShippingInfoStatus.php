<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shipping_info_status}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shipping_info_status_id
 * @property string $name
 * @property string $description
 *
 * @property Languages $lang
 * @property ShippingInfoStatus $shippingInfoStatus
 */
class TransShippingInfoStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shipping_info_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shipping_info_status_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['shipping_info_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShippingInfoStatus::className(), 'targetAttribute' => ['shipping_info_status_id' => 'id']],
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
            'shipping_info_status_id' => Yii::t('translate', 'Shipping Info Status ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShippingInfoStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingInfoStatus()
    {
        return $this->hasOne(ShippingInfoStatus::className(), ['id' => 'shipping_info_status_id'])->inverseOf('transShippingInfoStatuses');
    }

    /**
     * @inheritdoc
     * @return TransShippingInfoStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShippingInfoStatusQuery(get_called_class());
    }
}
