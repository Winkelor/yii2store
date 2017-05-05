<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_currencies}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $currencies_id
 * @property string $name
 * @property string $short_name
 *
 * @property Currencies $currencies
 * @property Languages $lang
 */
class TransCurrencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_currencies}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'currencies_id'], 'integer'],
            [['name', 'short_name'], 'string', 'max' => 255],
            [['currencies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currencies::className(), 'targetAttribute' => ['currencies_id' => 'id']],
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
            'currencies_id' => Yii::t('translate', 'Currencies ID'),
            'name' => Yii::t('translate', 'Name'),
            'short_name' => Yii::t('translate', 'Short Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencies()
    {
        return $this->hasOne(Currencies::className(), ['id' => 'currencies_id'])->inverseOf('transCurrencies');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transCurrencies');
    }

    /**
     * @inheritdoc
     * @return TransCurrenciesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransCurrenciesQuery(get_called_class());
    }
}
