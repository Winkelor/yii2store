<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%countries}}".
 *
 * @property integer $id
 * @property string $en_name
 * @property string $native_name
 * @property string $iso_code
 * @property string $iso_short
 * @property string $iso_long
 * @property string $un_code
 * @property string $iso_3166-1_code
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cultures[] $cultures
 * @property TransCountries[] $transCountries
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%countries}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['en_name', 'native_name', 'iso_code', 'iso_short', 'iso_long', 'un_code', 'iso_3166-1_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('countries', 'ID'),
            'en_name' => Yii::t('countries', 'En Name'),
            'native_name' => Yii::t('countries', 'Native Name'),
            'iso_code' => Yii::t('countries', 'Iso Code'),
            'iso_short' => Yii::t('countries', 'Iso Short'),
            'iso_long' => Yii::t('countries', 'Iso Long'),
            'un_code' => Yii::t('countries', 'Un Code'),
            'iso_3166-1_code' => Yii::t('countries', 'Iso 3166 1 Code'),
            'created_at' => Yii::t('countries', 'Created At'),
            'updated_at' => Yii::t('countries', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultures()
    {
        return $this->hasMany(Cultures::className(), ['country_id' => 'id'])->inverseOf('country');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCountries()
    {
        return $this->hasMany(TransCountries::className(), ['countries_id' => 'id'])->inverseOf('countries');
    }

    /**
     * @inheritdoc
     * @return CountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountriesQuery(get_called_class());
    }
}
