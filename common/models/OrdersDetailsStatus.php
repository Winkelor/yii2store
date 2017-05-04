<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%orders_details_status}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OrdersDetails[] $ordersDetails
 * @property TransOrdersDetailsStatus[] $transOrdersDetailsStatuses
 */
class OrdersDetailsStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders_details_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('orders_details_status', 'ID'),
            'name' => Yii::t('orders_details_status', 'Name'),
            'description' => Yii::t('orders_details_status', 'Description'),
            'is_active' => Yii::t('orders_details_status', 'Is Active'),
            'created_at' => Yii::t('orders_details_status', 'Created At'),
            'updated_at' => Yii::t('orders_details_status', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['status_id' => 'id'])->inverseOf('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransOrdersDetailsStatuses()
    {
        return $this->hasMany(TransOrdersDetailsStatus::className(), ['orders_details_status_id' => 'id'])->inverseOf('ordersDetailsStatus');
    }

    /**
     * @inheritdoc
     * @return OrdersDetailsStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersDetailsStatusQuery(get_called_class());
    }
}
