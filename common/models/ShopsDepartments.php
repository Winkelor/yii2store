<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shops_departments}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $name
 * @property string $short_name
 * @property integer $main_user_id
 * @property integer $type_id
 * @property integer $status_id
 * @property integer $address_id
 * @property integer $contact_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesProducts[] $attributesProducts
 * @property AttributesProductsGroup[] $attributesProductsGroups
 * @property CartDetails[] $cartDetails
 * @property DepartmentsConfig[] $departmentsConfigs
 * @property OrderComments[] $orderComments
 * @property Orders[] $orders
 * @property OrdersDetails[] $ordersDetails
 * @property ProductStatus[] $productStatuses
 * @property Products[] $products
 * @property ProductsAttributesLogisticsInfo[] $productsAttributesLogisticsInfos
 * @property ShopsCommerceData[] $shopsCommerceDatas
 * @property Addresses $address
 * @property Contacts $contact
 * @property UserAdmin $mainUser
 * @property Shops $shop
 * @property ShopsDepartmentsStatuses $status
 * @property ShopsDepartmentsTypes $type
 * @property TransShopsDepartments[] $transShopsDepartments
 * @property WishlistDetails[] $wishlistDetails
 */
class ShopsDepartments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shops_departments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'main_user_id', 'type_id', 'status_id', 'address_id', 'contact_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'short_name'], 'string', 'max' => 255],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Addresses::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacts::className(), 'targetAttribute' => ['contact_id' => 'id']],
            [['main_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAdmin::className(), 'targetAttribute' => ['main_user_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartmentsStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartmentsTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shops_departments', 'ID'),
            'shop_id' => Yii::t('shops_departments', 'Shop ID'),
            'name' => Yii::t('shops_departments', 'Name'),
            'short_name' => Yii::t('shops_departments', 'Short Name'),
            'main_user_id' => Yii::t('shops_departments', 'Main User ID'),
            'type_id' => Yii::t('shops_departments', 'Type ID'),
            'status_id' => Yii::t('shops_departments', 'Status ID'),
            'address_id' => Yii::t('shops_departments', 'Address ID'),
            'contact_id' => Yii::t('shops_departments', 'Contact ID'),
            'created_at' => Yii::t('shops_departments', 'Created At'),
            'updated_at' => Yii::t('shops_departments', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProducts()
    {
        return $this->hasMany(AttributesProducts::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroups()
    {
        return $this->hasMany(AttributesProductsGroup::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetails()
    {
        return $this->hasMany(CartDetails::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentsConfigs()
    {
        return $this->hasMany(DepartmentsConfig::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComments()
    {
        return $this->hasMany(OrderComments::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductStatuses()
    {
        return $this->hasMany(ProductStatus::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfos()
    {
        return $this->hasMany(ProductsAttributesLogisticsInfo::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsCommerceDatas()
    {
        return $this->hasMany(ShopsCommerceData::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Addresses::className(), ['id' => 'address_id'])->inverseOf('shopsDepartments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contact_id'])->inverseOf('shopsDepartments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainUser()
    {
        return $this->hasOne(UserAdmin::className(), ['id' => 'main_user_id'])->inverseOf('shopsDepartments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('shopsDepartments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ShopsDepartmentsStatuses::className(), ['id' => 'status_id'])->inverseOf('shopsDepartments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ShopsDepartmentsTypes::className(), ['id' => 'type_id'])->inverseOf('shopsDepartments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopsDepartments()
    {
        return $this->hasMany(TransShopsDepartments::className(), ['shops_departments_id' => 'id'])->inverseOf('shopsDepartments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlistDetails()
    {
        return $this->hasMany(WishlistDetails::className(), ['department_id' => 'id'])->inverseOf('department');
    }

    /**
     * @inheritdoc
     * @return ShopsDepartmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopsDepartmentsQuery(get_called_class());
    }
}
