<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shop_types}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shop_types_id
 * @property string $name
 * @property string $comment
 *
 * @property Languages $lang
 * @property ShopTypes $shopTypes
 */
class TransShopTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shop_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shop_types_id'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['shop_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopTypes::className(), 'targetAttribute' => ['shop_types_id' => 'id']],
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
            'shop_types_id' => Yii::t('translate', 'Shop Types ID'),
            'name' => Yii::t('translate', 'Name'),
            'comment' => Yii::t('translate', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShopTypes');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopTypes()
    {
        return $this->hasOne(ShopTypes::className(), ['id' => 'shop_types_id'])->inverseOf('transShopTypes');
    }

    /**
     * @inheritdoc
     * @return TransShopTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShopTypesQuery(get_called_class());
    }
}
