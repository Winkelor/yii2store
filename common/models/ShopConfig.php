<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shop_config}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $name
 * @property string $value
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Shops $shop
 */
class ShopConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['name', 'value'], 'string', 'max' => 255],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop_config', 'ID'),
            'shop_id' => Yii::t('shop_config', 'Shop ID'),
            'name' => Yii::t('shop_config', 'Name'),
            'value' => Yii::t('shop_config', 'Value'),
            'description' => Yii::t('shop_config', 'Description'),
            'created_at' => Yii::t('shop_config', 'Created At'),
            'updated_at' => Yii::t('shop_config', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('shopConfigs');
    }

    /**
     * @inheritdoc
     * @return ShopConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopConfigQuery(get_called_class());
    }
}
