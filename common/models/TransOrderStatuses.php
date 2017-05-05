<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_order_statuses}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $order_statuses_id
 * @property string $name
 * @property string $description
 *
 * @property Languages $lang
 * @property OrderStatuses $orderStatuses
 */
class TransOrderStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_order_statuses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'order_statuses_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['order_statuses_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatuses::className(), 'targetAttribute' => ['order_statuses_id' => 'id']],
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
            'order_statuses_id' => Yii::t('translate', 'Order Statuses ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transOrderStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatuses()
    {
        return $this->hasOne(OrderStatuses::className(), ['id' => 'order_statuses_id'])->inverseOf('transOrderStatuses');
    }

    /**
     * @inheritdoc
     * @return TransOrderStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransOrderStatusesQuery(get_called_class());
    }
}
