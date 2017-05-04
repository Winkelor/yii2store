<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%products_attributes_logistics_info}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $product_id
 * @property string $purchase_price
 * @property string $selling_price
 * @property integer $count
 * @property integer $shipping_box_info_id
 * @property integer $status_id
 * @property integer $is_action
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesProductsGroup[] $attributesProductsGroups
 * @property CartDetails[] $cartDetails
 * @property OrdersDetails[] $ordersDetails
 * @property ShopsDepartments $department
 * @property Products $product
 * @property ShippingBoxInfo $shippingBoxInfo
 * @property Shops $shop
 * @property ProductsAttributesLogisticsInfoStatuses $status
 * @property WishlistDetails[] $wishlistDetails
 */
class ProductsAttributesLogisticsInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products_attributes_logistics_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'product_id', 'count', 'shipping_box_info_id', 'status_id', 'is_action', 'created_at', 'updated_at'], 'integer'],
            [['purchase_price', 'selling_price'], 'number'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['shipping_box_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShippingBoxInfo::className(), 'targetAttribute' => ['shipping_box_info_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsAttributesLogisticsInfoStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('products_attributes_logistics_info', 'ID'),
            'shop_id' => Yii::t('products_attributes_logistics_info', 'Shop ID'),
            'department_id' => Yii::t('products_attributes_logistics_info', 'Department ID'),
            'product_id' => Yii::t('products_attributes_logistics_info', 'Product ID'),
            'purchase_price' => Yii::t('products_attributes_logistics_info', 'Purchase Price'),
            'selling_price' => Yii::t('products_attributes_logistics_info', 'Selling Price'),
            'count' => Yii::t('products_attributes_logistics_info', 'Count'),
            'shipping_box_info_id' => Yii::t('products_attributes_logistics_info', 'Shipping Box Info ID'),
            'status_id' => Yii::t('products_attributes_logistics_info', 'Status ID'),
            'is_action' => Yii::t('products_attributes_logistics_info', 'Is Action'),
            'created_at' => Yii::t('products_attributes_logistics_info', 'Created At'),
            'updated_at' => Yii::t('products_attributes_logistics_info', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroups()
    {
        return $this->hasMany(AttributesProductsGroup::className(), ['products_attributes_logistics_inf_id' => 'id'])->inverseOf('productsAttributesLogisticsInf');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetails()
    {
        return $this->hasMany(CartDetails::className(), ['products_attributes_logistics_info_id' => 'id'])->inverseOf('productsAttributesLogisticsInfo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['products_attributes_logistics_info_id' => 'id'])->inverseOf('productsAttributesLogisticsInfo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('productsAttributesLogisticsInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('productsAttributesLogisticsInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingBoxInfo()
    {
        return $this->hasOne(ShippingBoxInfo::className(), ['id' => 'shipping_box_info_id'])->inverseOf('productsAttributesLogisticsInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('productsAttributesLogisticsInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ProductsAttributesLogisticsInfoStatuses::className(), ['id' => 'status_id'])->inverseOf('productsAttributesLogisticsInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlistDetails()
    {
        return $this->hasMany(WishlistDetails::className(), ['products_attributes_logistics_info_id' => 'id'])->inverseOf('productsAttributesLogisticsInfo');
    }

    /**
     * @inheritdoc
     * @return ProductsAttributesLogisticsInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsAttributesLogisticsInfoQuery(get_called_class());
    }
}
