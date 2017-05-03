<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%currencies}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_name
 * @property integer $is_main
 * @property string $rate
 * @property integer $shop_id
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Shops $shop
 * @property Orders[] $orders
 * @property OrdersDetails[] $ordersDetails
 * @property TransCurrencies[] $transCurrencies
 */
class Currencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%currencies}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_main', 'shop_id', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['rate'], 'number'],
            [['name', 'short_name'], 'string', 'max' => 255],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('currencies', 'ID'),
            'name' => Yii::t('currencies', 'Name'),
            'short_name' => Yii::t('currencies', 'Short Name'),
            'is_main' => Yii::t('currencies', 'Is Main'),
            'rate' => Yii::t('currencies', 'Rate'),
            'shop_id' => Yii::t('currencies', 'Shop ID'),
            'is_active' => Yii::t('currencies', 'Is Active'),
            'created_at' => Yii::t('currencies', 'Created At'),
            'updated_at' => Yii::t('currencies', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('currencies');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['currency_id' => 'id'])->inverseOf('currency');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['currency_id' => 'id'])->inverseOf('currency');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCurrencies()
    {
        return $this->hasMany(TransCurrencies::className(), ['currencies_id' => 'id'])->inverseOf('currencies');
    }

    /**
     * @inheritdoc
     * @return CurrenciesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CurrenciesQuery(get_called_class());
    }
}
