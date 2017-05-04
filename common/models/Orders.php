<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property integer $id
 * @property string $order_user_id
 * @property integer $shop_id
 * @property integer $department_id
 * @property string $total_price
 * @property integer $currency_id
 * @property string $comment
 * @property integer $user_client_id
 * @property integer $shipping_info_id
 * @property integer $status_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OrderComments[] $orderComments
 * @property Currencies $currency
 * @property ShopsDepartments $department
 * @property ShippingInfo $shippingInfo
 * @property Shops $shop
 * @property OrderStatuses $status
 * @property UserClient $userClient
 * @property TransOrders[] $transOrders
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'currency_id', 'user_client_id', 'shipping_info_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['total_price'], 'number'],
            [['order_user_id', 'comment'], 'string', 'max' => 255],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currencies::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['shipping_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShippingInfo::className(), 'targetAttribute' => ['shipping_info_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_client_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserClient::className(), 'targetAttribute' => ['user_client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('orders', 'ID'),
            'order_user_id' => Yii::t('orders', 'Order User ID'),
            'shop_id' => Yii::t('orders', 'Shop ID'),
            'department_id' => Yii::t('orders', 'Department ID'),
            'total_price' => Yii::t('orders', 'Total Price'),
            'currency_id' => Yii::t('orders', 'Currency ID'),
            'comment' => Yii::t('orders', 'Comment'),
            'user_client_id' => Yii::t('orders', 'User Client ID'),
            'shipping_info_id' => Yii::t('orders', 'Shipping Info ID'),
            'status_id' => Yii::t('orders', 'Status ID'),
            'created_at' => Yii::t('orders', 'Created At'),
            'updated_at' => Yii::t('orders', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComments()
    {
        return $this->hasMany(OrderComments::className(), ['order_id' => 'id'])->inverseOf('order');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currencies::className(), ['id' => 'currency_id'])->inverseOf('orders');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('orders');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingInfo()
    {
        return $this->hasOne(ShippingInfo::className(), ['id' => 'shipping_info_id'])->inverseOf('orders');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('orders');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrderStatuses::className(), ['id' => 'status_id'])->inverseOf('orders');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserClient()
    {
        return $this->hasOne(UserClient::className(), ['id' => 'user_client_id'])->inverseOf('orders');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransOrders()
    {
        return $this->hasMany(TransOrders::className(), ['orders_id' => 'id'])->inverseOf('orders');
    }

    /**
     * @inheritdoc
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}
