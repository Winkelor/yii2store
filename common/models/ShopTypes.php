<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shop_types}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $comment
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Shops[] $shops
 * @property TransShopTypes[] $transShopTypes
 */
class ShopTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop_types', 'ID'),
            'name' => Yii::t('shop_types', 'Name'),
            'comment' => Yii::t('shop_types', 'Comment'),
            'is_active' => Yii::t('shop_types', 'Is Active'),
            'created_at' => Yii::t('shop_types', 'Created At'),
            'updated_at' => Yii::t('shop_types', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['type_id' => 'id'])->inverseOf('type');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopTypes()
    {
        return $this->hasMany(TransShopTypes::className(), ['shop_types_id' => 'id'])->inverseOf('shopTypes');
    }

    /**
     * @inheritdoc
     * @return ShopTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopTypesQuery(get_called_class());
    }
}
