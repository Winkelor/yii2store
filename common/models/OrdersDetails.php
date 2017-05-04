<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%orders_details}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $product_id
 * @property integer $products_attributes_logistics_info_id
 * @property integer $attributes_products_group_id
 * @property integer $order_id
 * @property string $price
 * @property integer $currency_id
 * @property integer $count
 * @property integer $status_id
 * @property integer $user_client_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesProductsGroup $attributesProductsGroup
 * @property Currencies $currency
 * @property ShopsDepartments $department
 * @property OrdersDetails $order
 * @property OrdersDetails[] $ordersDetails
 * @property Products $product
 * @property ProductsAttributesLogisticsInfo $productsAttributesLogisticsInfo
 * @property Shops $shop
 * @property OrdersDetailsStatus $status
 * @property UserClient $userClient
 */
class OrdersDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders_details}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'product_id', 'products_attributes_logistics_info_id', 'attributes_products_group_id', 'order_id', 'currency_id', 'count', 'status_id', 'user_client_id', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['attributes_products_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesProductsGroup::className(), 'targetAttribute' => ['attributes_products_group_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currencies::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrdersDetails::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['products_attributes_logistics_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsAttributesLogisticsInfo::className(), 'targetAttribute' => ['products_attributes_logistics_info_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrdersDetailsStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_client_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserClient::className(), 'targetAttribute' => ['user_client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('orders_details', 'ID'),
            'shop_id' => Yii::t('orders_details', 'Shop ID'),
            'department_id' => Yii::t('orders_details', 'Department ID'),
            'product_id' => Yii::t('orders_details', 'Product ID'),
            'products_attributes_logistics_info_id' => Yii::t('orders_details', 'Products Attributes Logistics Info ID'),
            'attributes_products_group_id' => Yii::t('orders_details', 'Attributes Products Group ID'),
            'order_id' => Yii::t('orders_details', 'Order ID'),
            'price' => Yii::t('orders_details', 'Price'),
            'currency_id' => Yii::t('orders_details', 'Currency ID'),
            'count' => Yii::t('orders_details', 'Count'),
            'status_id' => Yii::t('orders_details', 'Status ID'),
            'user_client_id' => Yii::t('orders_details', 'User Client ID'),
            'created_at' => Yii::t('orders_details', 'Created At'),
            'updated_at' => Yii::t('orders_details', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroup()
    {
        return $this->hasOne(AttributesProductsGroup::className(), ['id' => 'attributes_products_group_id'])->inverseOf('ordersDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currencies::className(), ['id' => 'currency_id'])->inverseOf('ordersDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('ordersDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(OrdersDetails::className(), ['id' => 'order_id'])->inverseOf('ordersDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['order_id' => 'id'])->inverseOf('order');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('ordersDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfo()
    {
        return $this->hasOne(ProductsAttributesLogisticsInfo::className(), ['id' => 'products_attributes_logistics_info_id'])->inverseOf('ordersDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('ordersDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrdersDetailsStatus::className(), ['id' => 'status_id'])->inverseOf('ordersDetails');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserClient()
    {
        return $this->hasOne(UserClient::className(), ['id' => 'user_client_id'])->inverseOf('ordersDetails');
    }

    /**
     * @inheritdoc
     * @return OrdersDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersDetailsQuery(get_called_class());
    }
}
