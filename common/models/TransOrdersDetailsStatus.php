<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_orders_details_status}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $orders_details_status_id
 * @property string $name
 * @property string $description
 *
 * @property Languages $lang
 * @property OrdersDetailsStatus $ordersDetailsStatus
 */
class TransOrdersDetailsStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_orders_details_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'orders_details_status_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['orders_details_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrdersDetailsStatus::className(), 'targetAttribute' => ['orders_details_status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translate', 'ID'),
            'lang_id' => Yii::t('translate', 'Lang ID'),
            'orders_details_status_id' => Yii::t('translate', 'Orders Details Status ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transOrdersDetailsStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetailsStatus()
    {
        return $this->hasOne(OrdersDetailsStatus::className(), ['id' => 'orders_details_status_id'])->inverseOf('transOrdersDetailsStatuses');
    }

    /**
     * @inheritdoc
     * @return TransOrdersDetailsStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransOrdersDetailsStatusQuery(get_called_class());
    }
}
