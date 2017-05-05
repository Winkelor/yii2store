<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_cultures}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $cultures_id
 * @property string $language_culture_name
 * @property string $display_ame
 * @property string $culture_code
 * @property string $ISO_639x_value
 *
 * @property Cultures $cultures
 * @property Languages $lang
 */
class TransCultures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_cultures}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'cultures_id'], 'integer'],
            [['language_culture_name', 'display_ame', 'culture_code', 'ISO_639x_value'], 'string', 'max' => 255],
            [['cultures_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cultures::className(), 'targetAttribute' => ['cultures_id' => 'id']],
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
            'cultures_id' => Yii::t('translate', 'Cultures ID'),
            'language_culture_name' => Yii::t('translate', 'Language Culture Name'),
            'display_ame' => Yii::t('translate', 'Display Ame'),
            'culture_code' => Yii::t('translate', 'Culture Code'),
            'ISO_639x_value' => Yii::t('translate', 'Iso 639x Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultures()
    {
        return $this->hasOne(Cultures::className(), ['id' => 'cultures_id'])->inverseOf('transCultures');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transCultures');
    }

    /**
     * @inheritdoc
     * @return TransCulturesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransCulturesQuery(get_called_class());
    }
}
