<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cart_details}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $product_id
 * @property integer $products_attributes_logistics_info_id
 * @property integer $attributes_products_group_id
 * @property integer $cart_id
 * @property integer $count
 * @property integer $status_id
 * @property integer $user_client_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesProductsGroup $attributesProductsGroup
 * @property AttributesProductsGroup $cart
 * @property ShopsDepartments $department
 * @property Products $product
 * @property ProductsAttributesLogisticsInfo $productsAttributesLogisticsInfo
 * @property Shops $shop
 * @property CartDetailsStatus $status
 * @property UserClient $userClient
 */
class CartDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cart_details}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'product_id', 'products_attributes_logistics_info_id', 'attributes_products_group_id', 'cart_id', 'count', 'status_id', 'user_client_id', 'created_at', 'updated_at'], 'integer'],
            [['attributes_products_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesProductsGroup::className(), 'targetAttribute' => ['attributes_products_group_id' => 'id']],
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesProductsGroup::className(), 'targetAttribute' => ['cart_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['products_attributes_logistics_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsAttributesLogisticsInfo::className(), 'targetAttribute' => ['products_attributes_logistics_info_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => CartDetailsStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_client_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserClient::className(), 'targetAttribute' => ['user_client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cart_details', 'ID'),
            'shop_id' => Yii::t('cart_details', 'Shop ID'),
            'department_id' => Yii::t('cart_details', 'Department ID'),
            'product_id' => Yii::t('cart_details', 'Product ID'),
            'products_attributes_logistics_info_id' => Yii::t('cart_details', 'Products Attributes Logistics Info ID'),
            'attributes_products_group_id' => Yii::t('cart_details', 'Attributes Products Group ID'),
            'cart_id' => Yii::t('cart_details', 'Cart ID'),
            'count' => Yii::t('cart_details', 'Count'),
            'status_id' => Yii::t('cart_details', 'Status ID'),
            'user_client_id' => Yii::t('cart_details', 'User Client ID'),
            'created_at' => Yii::t('cart_details', 'Created At'),
            'updated_at' => Yii::t('cart_details', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroup()
    {
        return $this->hasOne(AttributesProductsGroup::className(), ['id' => 'attributes_products_group_id'])->inverseOf('cartDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(AttributesProductsGroup::className(), ['id' => 'cart_id'])->inverseOf('cartDetails0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('cartDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('cartDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfo()
    {
        return $this->hasOne(ProductsAttributesLogisticsInfo::className(), ['id' => 'products_attributes_logistics_info_id'])->inverseOf('cartDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('cartDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(CartDetailsStatus::className(), ['id' => 'status_id'])->inverseOf('cartDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserClient()
    {
        return $this->hasOne(UserClient::className(), ['id' => 'user_client_id'])->inverseOf('cartDetails');
    }

    /**
     * @inheritdoc
     * @return CartDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CartDetailsQuery(get_called_class());
    }
}
