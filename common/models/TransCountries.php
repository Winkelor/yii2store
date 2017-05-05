<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_countries}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $countries_id
 * @property string $en_name
 * @property string $native_name
 * @property string $iso_code
 * @property string $iso_short
 * @property string $iso_long
 * @property string $un_code
 * @property string $iso_3166-1_code
 *
 * @property Countries $countries
 * @property Languages $lang
 */
class TransCountries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_countries}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'countries_id'], 'integer'],
            [['en_name', 'native_name', 'iso_code', 'iso_short', 'iso_long', 'un_code', 'iso_3166-1_code'], 'string', 'max' => 255],
            [['countries_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['countries_id' => 'id']],
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
            'countries_id' => Yii::t('translate', 'Countries ID'),
            'en_name' => Yii::t('translate', 'En Name'),
            'native_name' => Yii::t('translate', 'Native Name'),
            'iso_code' => Yii::t('translate', 'Iso Code'),
            'iso_short' => Yii::t('translate', 'Iso Short'),
            'iso_long' => Yii::t('translate', 'Iso Long'),
            'un_code' => Yii::t('translate', 'Un Code'),
            'iso_3166-1_code' => Yii::t('translate', 'Iso 3166 1 Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasOne(Countries::className(), ['id' => 'countries_id'])->inverseOf('transCountries');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transCountries');
    }

    /**
     * @inheritdoc
     * @return TransCountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransCountriesQuery(get_called_class());
    }
}
