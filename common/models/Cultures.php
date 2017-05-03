<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cultures}}".
 *
 * @property integer $id
 * @property string $language_culture_name
 * @property string $display_ame
 * @property string $culture_code
 * @property string $ISO_639x_value
 * @property integer $language_id
 * @property integer $country_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Countries $country
 * @property Languages $language
 * @property ShopsCultures[] $shopsCultures
 * @property TransCultures[] $transCultures
 */
class Cultures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cultures}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'country_id', 'created_at', 'updated_at'], 'integer'],
            [['language_culture_name', 'display_ame', 'culture_code', 'ISO_639x_value'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cultures', 'ID'),
            'language_culture_name' => Yii::t('cultures', 'Language Culture Name'),
            'display_ame' => Yii::t('cultures', 'Display Ame'),
            'culture_code' => Yii::t('cultures', 'Culture Code'),
            'ISO_639x_value' => Yii::t('cultures', 'Iso 639x Value'),
            'language_id' => Yii::t('cultures', 'Language ID'),
            'country_id' => Yii::t('cultures', 'Country ID'),
            'created_at' => Yii::t('cultures', 'Created At'),
            'updated_at' => Yii::t('cultures', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id'])->inverseOf('cultures');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Languages::className(), ['id' => 'language_id'])->inverseOf('cultures');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsCultures()
    {
        return $this->hasMany(ShopsCultures::className(), ['culture_id' => 'id'])->inverseOf('culture');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCultures()
    {
        return $this->hasMany(TransCultures::className(), ['cultures_id' => 'id'])->inverseOf('cultures');
    }

    /**
     * @inheritdoc
     * @return CulturesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CulturesQuery(get_called_class());
    }
}
