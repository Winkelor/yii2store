<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shops_commerce_data}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shops_commerce_data_id
 * @property string $name
 * @property string $value
 *
 * @property Languages $lang
 * @property ShopsCommerceData $shopsCommerceData
 */
class TransShopsCommerceData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shops_commerce_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shops_commerce_data_id'], 'integer'],
            [['name', 'value'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['shops_commerce_data_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsCommerceData::className(), 'targetAttribute' => ['shops_commerce_data_id' => 'id']],
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
            'shops_commerce_data_id' => Yii::t('translate', 'Shops Commerce Data ID'),
            'name' => Yii::t('translate', 'Name'),
            'value' => Yii::t('translate', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShopsCommerceDatas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsCommerceData()
    {
        return $this->hasOne(ShopsCommerceData::className(), ['id' => 'shops_commerce_data_id'])->inverseOf('transShopsCommerceDatas');
    }

    /**
     * @inheritdoc
     * @return TransShopsCommerceDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShopsCommerceDataQuery(get_called_class());
    }
}
