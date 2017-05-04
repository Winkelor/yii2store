<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product_status}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $product_id
 * @property string $name
 * @property string $description
 * @property integer $is_action
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopsDepartments $department
 * @property Products $product
 * @property Shops $shop
 * @property TransProductStatus[] $transProductStatuses
 */
class ProductStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'product_id', 'is_action', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('product_status', 'ID'),
            'shop_id' => Yii::t('product_status', 'Shop ID'),
            'department_id' => Yii::t('product_status', 'Department ID'),
            'product_id' => Yii::t('product_status', 'Product ID'),
            'name' => Yii::t('product_status', 'Name'),
            'description' => Yii::t('product_status', 'Description'),
            'is_action' => Yii::t('product_status', 'Is Action'),
            'created_at' => Yii::t('product_status', 'Created At'),
            'updated_at' => Yii::t('product_status', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('productStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('productStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('productStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransProductStatuses()
    {
        return $this->hasMany(TransProductStatus::className(), ['product_status_id' => 'id'])->inverseOf('productStatus');
    }

    /**
     * @inheritdoc
     * @return ProductStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductStatusQuery(get_called_class());
    }
}
