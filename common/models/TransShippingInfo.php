<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shipping_info}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shipping_info_id
 * @property string $post_tracker
 *
 * @property Languages $lang
 * @property ShippingInfo $shippingInfo
 */
class TransShippingInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shipping_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shipping_info_id'], 'integer'],
            [['post_tracker'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['shipping_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShippingInfo::className(), 'targetAttribute' => ['shipping_info_id' => 'id']],
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
            'shipping_info_id' => Yii::t('translate', 'Shipping Info ID'),
            'post_tracker' => Yii::t('translate', 'Post Tracker'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShippingInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingInfo()
    {
        return $this->hasOne(ShippingInfo::className(), ['id' => 'shipping_info_id'])->inverseOf('transShippingInfos');
    }

    /**
     * @inheritdoc
     * @return TransShippingInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShippingInfoQuery(get_called_class());
    }
}
