<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shops_commerce_data}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property string $name
 * @property string $value
 * @property string $description
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopsDepartments $department
 * @property Shops $shop
 * @property TransShopsCommerceData[] $transShopsCommerceDatas
 */
class ShopsCommerceData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shops_commerce_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'created_at', 'updated_at'], 'integer'],
            [['description', 'text'], 'string'],
            [['name', 'value'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shops_commerce_data', 'ID'),
            'shop_id' => Yii::t('shops_commerce_data', 'Shop ID'),
            'department_id' => Yii::t('shops_commerce_data', 'Department ID'),
            'name' => Yii::t('shops_commerce_data', 'Name'),
            'value' => Yii::t('shops_commerce_data', 'Value'),
            'description' => Yii::t('shops_commerce_data', 'Description'),
            'text' => Yii::t('shops_commerce_data', 'Text'),
            'created_at' => Yii::t('shops_commerce_data', 'Created At'),
            'updated_at' => Yii::t('shops_commerce_data', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('shopsCommerceDatas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('shopsCommerceDatas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopsCommerceDatas()
    {
        return $this->hasMany(TransShopsCommerceData::className(), ['shops_commerce_data_id' => 'id'])->inverseOf('shopsCommerceData');
    }

    /**
     * @inheritdoc
     * @return ShopsCommerceDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopsCommerceDataQuery(get_called_class());
    }
}
