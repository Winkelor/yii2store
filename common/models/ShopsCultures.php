<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shops_cultures}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $culture_id
 * @property integer $is_default
 * @property integer $is_second
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cultures $culture
 * @property Shops $shop
 */
class ShopsCultures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shops_cultures}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'culture_id', 'is_default', 'is_second', 'created_at', 'updated_at'], 'integer'],
            [['culture_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cultures::className(), 'targetAttribute' => ['culture_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shops_cultures', 'ID'),
            'shop_id' => Yii::t('shops_cultures', 'Shop ID'),
            'culture_id' => Yii::t('shops_cultures', 'Culture ID'),
            'is_default' => Yii::t('shops_cultures', 'Is Default'),
            'is_second' => Yii::t('shops_cultures', 'Is Second'),
            'created_at' => Yii::t('shops_cultures', 'Created At'),
            'updated_at' => Yii::t('shops_cultures', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCulture()
    {
        return $this->hasOne(Cultures::className(), ['id' => 'culture_id'])->inverseOf('shopsCultures');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('shopsCultures');
    }

    /**
     * @inheritdoc
     * @return ShopsCulturesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopsCulturesQuery(get_called_class());
    }
}
