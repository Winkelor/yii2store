<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_orders}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $orders_id
 * @property string $comment
 *
 * @property Languages $lang
 * @property Orders $orders
 */
class TransOrders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'orders_id'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orders_id' => 'id']],
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
            'orders_id' => Yii::t('translate', 'Orders ID'),
            'comment' => Yii::t('translate', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transOrders');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::className(), ['id' => 'orders_id'])->inverseOf('transOrders');
    }

    /**
     * @inheritdoc
     * @return TransOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransOrdersQuery(get_called_class());
    }
}
