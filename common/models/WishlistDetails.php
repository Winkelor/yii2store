<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%wishlist_details}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $product_id
 * @property integer $products_attributes_logistics_info_id
 * @property integer $attributes_products_group_id
 * @property integer $wishlist_id
 * @property integer $count
 * @property integer $user_client_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesProductsGroup $attributesProductsGroup
 * @property ShopsDepartments $department
 * @property Products $product
 * @property ProductsAttributesLogisticsInfo $productsAttributesLogisticsInfo
 * @property Shops $shop
 * @property UserClient $userClient
 * @property Wishlist $wishlist
 */
class WishlistDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wishlist_details}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'product_id', 'products_attributes_logistics_info_id', 'attributes_products_group_id', 'wishlist_id', 'count', 'user_client_id', 'created_at', 'updated_at'], 'integer'],
            [['attributes_products_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesProductsGroup::className(), 'targetAttribute' => ['attributes_products_group_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['products_attributes_logistics_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsAttributesLogisticsInfo::className(), 'targetAttribute' => ['products_attributes_logistics_info_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['user_client_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserClient::className(), 'targetAttribute' => ['user_client_id' => 'id']],
            [['wishlist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wishlist::className(), 'targetAttribute' => ['wishlist_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('wishlist_details', 'ID'),
            'shop_id' => Yii::t('wishlist_details', 'Shop ID'),
            'department_id' => Yii::t('wishlist_details', 'Department ID'),
            'product_id' => Yii::t('wishlist_details', 'Product ID'),
            'products_attributes_logistics_info_id' => Yii::t('wishlist_details', 'Products Attributes Logistics Info ID'),
            'attributes_products_group_id' => Yii::t('wishlist_details', 'Attributes Products Group ID'),
            'wishlist_id' => Yii::t('wishlist_details', 'Wishlist ID'),
            'count' => Yii::t('wishlist_details', 'Count'),
            'user_client_id' => Yii::t('wishlist_details', 'User Client ID'),
            'created_at' => Yii::t('wishlist_details', 'Created At'),
            'updated_at' => Yii::t('wishlist_details', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroup()
    {
        return $this->hasOne(AttributesProductsGroup::className(), ['id' => 'attributes_products_group_id'])->inverseOf('wishlistDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('wishlistDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('wishlistDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfo()
    {
        return $this->hasOne(ProductsAttributesLogisticsInfo::className(), ['id' => 'products_attributes_logistics_info_id'])->inverseOf('wishlistDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('wishlistDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserClient()
    {
        return $this->hasOne(UserClient::className(), ['id' => 'user_client_id'])->inverseOf('wishlistDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlist()
    {
        return $this->hasOne(Wishlist::className(), ['id' => 'wishlist_id'])->inverseOf('wishlistDetails');
    }

    /**
     * @inheritdoc
     * @return WishlistDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WishlistDetailsQuery(get_called_class());
    }
}
