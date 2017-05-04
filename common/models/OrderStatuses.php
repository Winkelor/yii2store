<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order_statuses}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Orders[] $orders
 * @property TransOrderStatuses[] $transOrderStatuses
 */
class OrderStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_statuses}}';
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
            'id' => Yii::t('order_statuses', 'ID'),
            'name' => Yii::t('order_statuses', 'Name'),
            'description' => Yii::t('order_statuses', 'Description'),
            'is_active' => Yii::t('order_statuses', 'Is Active'),
            'created_at' => Yii::t('order_statuses', 'Created At'),
            'updated_at' => Yii::t('order_statuses', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['status_id' => 'id'])->inverseOf('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransOrderStatuses()
    {
        return $this->hasMany(TransOrderStatuses::className(), ['order_statuses_id' => 'id'])->inverseOf('orderStatuses');
    }

    /**
     * @inheritdoc
     * @return OrderStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderStatusesQuery(get_called_class());
    }
}
