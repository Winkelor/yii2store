<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attributes_products_group}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $product_id
 * @property integer $products_attributes_logistics_inf_id
 * @property integer $attribute_product_id
 * @property integer $attribute_category_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesCategories $attributeCategory
 * @property AttributesProducts $attributeProduct
 * @property ShopsDepartments $department
 * @property Products $product
 * @property ProductsAttributesLogisticsInfo $productsAttributesLogisticsInf
 * @property Shops $shop
 * @property CartDetails[] $cartDetails
 * @property CartDetails[] $cartDetails0
 * @property OrdersDetails[] $ordersDetails
 * @property WishlistDetails[] $wishlistDetails
 */
class AttributesProductsGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attributes_products_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'product_id', 'products_attributes_logistics_inf_id', 'attribute_product_id', 'attribute_category_id', 'created_at', 'updated_at'], 'integer'],
            [['attribute_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesCategories::className(), 'targetAttribute' => ['attribute_category_id' => 'id']],
            [['attribute_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesProducts::className(), 'targetAttribute' => ['attribute_product_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['products_attributes_logistics_inf_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsAttributesLogisticsInfo::className(), 'targetAttribute' => ['products_attributes_logistics_inf_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('attributes_products_group', 'ID'),
            'shop_id' => Yii::t('attributes_products_group', 'Shop ID'),
            'department_id' => Yii::t('attributes_products_group', 'Department ID'),
            'product_id' => Yii::t('attributes_products_group', 'Product ID'),
            'products_attributes_logistics_inf_id' => Yii::t('attributes_products_group', 'Products Attributes Logistics Inf ID'),
            'attribute_product_id' => Yii::t('attributes_products_group', 'Attribute Product ID'),
            'attribute_category_id' => Yii::t('attributes_products_group', 'Attribute Category ID'),
            'created_at' => Yii::t('attributes_products_group', 'Created At'),
            'updated_at' => Yii::t('attributes_products_group', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeCategory()
    {
        return $this->hasOne(AttributesCategories::className(), ['id' => 'attribute_category_id'])->inverseOf('attributesProductsGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeProduct()
    {
        return $this->hasOne(AttributesProducts::className(), ['id' => 'attribute_product_id'])->inverseOf('attributesProductsGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('attributesProductsGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('attributesProductsGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInf()
    {
        return $this->hasOne(ProductsAttributesLogisticsInfo::className(), ['id' => 'products_attributes_logistics_inf_id'])->inverseOf('attributesProductsGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('attributesProductsGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetails()
    {
        return $this->hasMany(CartDetails::className(), ['attributes_products_group_id' => 'id'])->inverseOf('attributesProductsGroup');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetails0()
    {
        return $this->hasMany(CartDetails::className(), ['cart_id' => 'id'])->inverseOf('cart');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['attributes_products_group_id' => 'id'])->inverseOf('attributesProductsGroup');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlistDetails()
    {
        return $this->hasMany(WishlistDetails::className(), ['attributes_products_group_id' => 'id'])->inverseOf('attributesProductsGroup');
    }

    /**
     * @inheritdoc
     * @return AttributesProductsGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttributesProductsGroupQuery(get_called_class());
    }
}
