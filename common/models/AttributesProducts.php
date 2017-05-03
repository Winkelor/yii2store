<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attributes_products}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $product_id
 * @property string $value
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopsDepartments $department
 * @property Products $product
 * @property Shops $shop
 * @property AttributesProductsGroup[] $attributesProductsGroups
 * @property ImageInfoAttributesProducts[] $imageInfoAttributesProducts
 * @property TransAttributesProducts[] $transAttributesProducts
 */
class AttributesProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attributes_products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'product_id', 'created_at', 'updated_at'], 'integer'],
            [['value'], 'string', 'max' => 255],
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
            'id' => Yii::t('attributes_products', 'ID'),
            'shop_id' => Yii::t('attributes_products', 'Shop ID'),
            'department_id' => Yii::t('attributes_products', 'Department ID'),
            'product_id' => Yii::t('attributes_products', 'Product ID'),
            'value' => Yii::t('attributes_products', 'Value'),
            'created_at' => Yii::t('attributes_products', 'Created At'),
            'updated_at' => Yii::t('attributes_products', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('attributesProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('attributesProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('attributesProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroups()
    {
        return $this->hasMany(AttributesProductsGroup::className(), ['attribute_product_id' => 'id'])->inverseOf('attributeProduct');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoAttributesProducts()
    {
        return $this->hasMany(ImageInfoAttributesProducts::className(), ['attribute_product_id' => 'id'])->inverseOf('attributeProduct');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAttributesProducts()
    {
        return $this->hasMany(TransAttributesProducts::className(), ['attributes_products_id' => 'id'])->inverseOf('attributesProducts');
    }

    /**
     * @inheritdoc
     * @return AttributesProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttributesProductsQuery(get_called_class());
    }
}
