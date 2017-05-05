<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shops}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shops_id
 * @property string $name
 * @property string $short_name
 *
 * @property Languages $lang
 * @property Shops $shops
 */
class TransShops extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shops}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shops_id'], 'integer'],
            [['name', 'short_name'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['shops_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shops_id' => 'id']],
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
            'shops_id' => Yii::t('translate', 'Shops ID'),
            'name' => Yii::t('translate', 'Name'),
            'short_name' => Yii::t('translate', 'Short Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShops');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shops_id'])->inverseOf('transShops');
    }

    /**
     * @inheritdoc
     * @return TransShopsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShopsQuery(get_called_class());
    }
}
