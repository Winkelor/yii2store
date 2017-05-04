<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shipping_info}}".
 *
 * @property integer $id
 * @property string $post_tracker
 * @property string $date_start
 * @property string $date_end
 * @property integer $status_id
 * @property integer $address_id
 * @property integer $contact_id
 * @property integer $shipping_box_info_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Orders[] $orders
 * @property Addresses $address
 * @property Contacts $contact
 * @property ShippingBoxInfo $shippingBoxInfo
 * @property ShippingInfoStatus $status
 * @property TransShippingInfo[] $transShippingInfos
 */
class ShippingInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shipping_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_start', 'date_end'], 'safe'],
            [['status_id', 'address_id', 'contact_id', 'shipping_box_info_id', 'created_at', 'updated_at'], 'integer'],
            [['post_tracker'], 'string', 'max' => 255],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Addresses::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacts::className(), 'targetAttribute' => ['contact_id' => 'id']],
            [['shipping_box_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShippingBoxInfo::className(), 'targetAttribute' => ['shipping_box_info_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShippingInfoStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shipping_info', 'ID'),
            'post_tracker' => Yii::t('shipping_info', 'Post Tracker'),
            'date_start' => Yii::t('shipping_info', 'Date Start'),
            'date_end' => Yii::t('shipping_info', 'Date End'),
            'status_id' => Yii::t('shipping_info', 'Status ID'),
            'address_id' => Yii::t('shipping_info', 'Address ID'),
            'contact_id' => Yii::t('shipping_info', 'Contact ID'),
            'shipping_box_info_id' => Yii::t('shipping_info', 'Shipping Box Info ID'),
            'created_at' => Yii::t('shipping_info', 'Created At'),
            'updated_at' => Yii::t('shipping_info', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['shipping_info_id' => 'id'])->inverseOf('shippingInfo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Addresses::className(), ['id' => 'address_id'])->inverseOf('shippingInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contact_id'])->inverseOf('shippingInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingBoxInfo()
    {
        return $this->hasOne(ShippingBoxInfo::className(), ['id' => 'shipping_box_info_id'])->inverseOf('shippingInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ShippingInfoStatus::className(), ['id' => 'status_id'])->inverseOf('shippingInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShippingInfos()
    {
        return $this->hasMany(TransShippingInfo::className(), ['shipping_info_id' => 'id'])->inverseOf('shippingInfo');
    }

    /**
     * @inheritdoc
     * @return ShippingInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShippingInfoQuery(get_called_class());
    }
}
