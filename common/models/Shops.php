<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shops}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_name
 * @property integer $main_user_id
 * @property integer $type_id
 * @property integer $status_id
 * @property integer $address_id
 * @property integer $contact_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $country_id
 *
 * @property AttributesCategories[] $attributesCategories
 * @property AttributesGroups[] $attributesGroups
 * @property AttributesProducts[] $attributesProducts
 * @property AttributesProductsGroup[] $attributesProductsGroups
 * @property CartDetails[] $cartDetails
 * @property Categories[] $categories
 * @property Currencies[] $currencies
 * @property DepartmentsConfig[] $departmentsConfigs
 * @property ImageInfo[] $imageInfos
 * @property ImageInfoAttributesProducts[] $imageInfoAttributesProducts
 * @property ImageInfoCategories[] $imageInfoCategories
 * @property ImageInfoGlobalCategories[] $imageInfoGlobalCategories
 * @property ImageInfoProducts[] $imageInfoProducts
 * @property OrderComments[] $orderComments
 * @property Orders[] $orders
 * @property OrdersDetails[] $ordersDetails
 * @property ProductStatus[] $productStatuses
 * @property Products[] $products
 * @property ProductsAttributesLogisticsInfo[] $productsAttributesLogisticsInfos
 * @property ProductsComments[] $productsComments
 * @property SeoInfo[] $seoInfos
 * @property ShippingBoxInfo[] $shippingBoxInfos
 * @property ShopConfig[] $shopConfigs
 * @property Addresses $address
 * @property Contacts $contact
 * @property Countries $country
 * @property UserAdmin $mainUser
 * @property ShopStatuses $status
 * @property ShopTypes $type
 * @property ShopsCommerceData[] $shopsCommerceDatas
 * @property ShopsCultures[] $shopsCultures
 * @property ShopsDepartments[] $shopsDepartments
 * @property ShopsManagers[] $shopsManagers
 * @property TransShops[] $transShops
 * @property UserAdmin[] $userAdmins
 * @property WishlistDetails[] $wishlistDetails
 */
class Shops extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shops}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_user_id', 'type_id', 'status_id', 'address_id', 'contact_id', 'created_at', 'updated_at', 'country_id'], 'integer'],
            [['name', 'short_name'], 'string', 'max' => 255],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Addresses::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacts::className(), 'targetAttribute' => ['contact_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['main_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAdmin::className(), 'targetAttribute' => ['main_user_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shops', 'ID'),
            'name' => Yii::t('shops', 'Name'),
            'short_name' => Yii::t('shops', 'Short Name'),
            'main_user_id' => Yii::t('shops', 'Main User ID'),
            'type_id' => Yii::t('shops', 'Type ID'),
            'status_id' => Yii::t('shops', 'Status ID'),
            'address_id' => Yii::t('shops', 'Address ID'),
            'contact_id' => Yii::t('shops', 'Contact ID'),
            'created_at' => Yii::t('shops', 'Created At'),
            'updated_at' => Yii::t('shops', 'Updated At'),
            'country_id' => Yii::t('shops', 'Country ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesCategories()
    {
        return $this->hasMany(AttributesCategories::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesGroups()
    {
        return $this->hasMany(AttributesGroups::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProducts()
    {
        return $this->hasMany(AttributesProducts::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroups()
    {
        return $this->hasMany(AttributesProductsGroup::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetails()
    {
        return $this->hasMany(CartDetails::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencies()
    {
        return $this->hasMany(Currencies::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentsConfigs()
    {
        return $this->hasMany(DepartmentsConfig::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfos()
    {
        return $this->hasMany(ImageInfo::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoAttributesProducts()
    {
        return $this->hasMany(ImageInfoAttributesProducts::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoCategories()
    {
        return $this->hasMany(ImageInfoCategories::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoGlobalCategories()
    {
        return $this->hasMany(ImageInfoGlobalCategories::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoProducts()
    {
        return $this->hasMany(ImageInfoProducts::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComments()
    {
        return $this->hasMany(OrderComments::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductStatuses()
    {
        return $this->hasMany(ProductStatus::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfos()
    {
        return $this->hasMany(ProductsAttributesLogisticsInfo::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsComments()
    {
        return $this->hasMany(ProductsComments::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeoInfos()
    {
        return $this->hasMany(SeoInfo::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingBoxInfos()
    {
        return $this->hasMany(ShippingBoxInfo::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopConfigs()
    {
        return $this->hasMany(ShopConfig::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Addresses::className(), ['id' => 'address_id'])->inverseOf('shops');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contact_id'])->inverseOf('shops');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id'])->inverseOf('shops');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainUser()
    {
        return $this->hasOne(UserAdmin::className(), ['id' => 'main_user_id'])->inverseOf('shops');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ShopStatuses::className(), ['id' => 'status_id'])->inverseOf('shops');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ShopTypes::className(), ['id' => 'type_id'])->inverseOf('shops');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsCommerceDatas()
    {
        return $this->hasMany(ShopsCommerceData::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsCultures()
    {
        return $this->hasMany(ShopsCultures::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartments()
    {
        return $this->hasMany(ShopsDepartments::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsManagers()
    {
        return $this->hasMany(ShopsManagers::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShops()
    {
        return $this->hasMany(TransShops::className(), ['shops_id' => 'id'])->inverseOf('shops');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAdmins()
    {
        return $this->hasMany(UserAdmin::className(), ['active_shop_id' => 'id'])->inverseOf('activeShop');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlistDetails()
    {
        return $this->hasMany(WishlistDetails::className(), ['shop_id' => 'id'])->inverseOf('shop');
    }

    /**
     * @inheritdoc
     * @return ShopsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopsQuery(get_called_class());
    }
}
