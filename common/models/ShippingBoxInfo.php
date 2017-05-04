<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shipping_box_info}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $price
 * @property string $weight
 * @property string $length
 * @property string $width
 * @property string $height
 * @property integer $not_drop
 * @property integer $type_package_id
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ProductsAttributesLogisticsInfo[] $productsAttributesLogisticsInfos
 * @property Shops $shop
 * @property ShippingBoxInfoTypePackage $typePackage
 * @property ShippingInfo[] $shippingInfos
 */
class ShippingBoxInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shipping_box_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'not_drop', 'type_package_id', 'created_at', 'updated_at'], 'integer'],
            [['price', 'weight', 'length', 'width', 'height'], 'number'],
            [['comment'], 'string', 'max' => 255],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['type_package_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShippingBoxInfoTypePackage::className(), 'targetAttribute' => ['type_package_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shipping_box_info', 'ID'),
            'shop_id' => Yii::t('shipping_box_info', 'Shop ID'),
            'price' => Yii::t('shipping_box_info', 'Price'),
            'weight' => Yii::t('shipping_box_info', 'Weight'),
            'length' => Yii::t('shipping_box_info', 'Length'),
            'width' => Yii::t('shipping_box_info', 'Width'),
            'height' => Yii::t('shipping_box_info', 'Height'),
            'not_drop' => Yii::t('shipping_box_info', 'Not Drop'),
            'type_package_id' => Yii::t('shipping_box_info', 'Type Package ID'),
            'comment' => Yii::t('shipping_box_info', 'Comment'),
            'created_at' => Yii::t('shipping_box_info', 'Created At'),
            'updated_at' => Yii::t('shipping_box_info', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfos()
    {
        return $this->hasMany(ProductsAttributesLogisticsInfo::className(), ['shipping_box_info_id' => 'id'])->inverseOf('shippingBoxInfo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('shippingBoxInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypePackage()
    {
        return $this->hasOne(ShippingBoxInfoTypePackage::className(), ['id' => 'type_package_id'])->inverseOf('shippingBoxInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingInfos()
    {
        return $this->hasMany(ShippingInfo::className(), ['shipping_box_info_id' => 'id'])->inverseOf('shippingBoxInfo');
    }

    /**
     * @inheritdoc
     * @return ShippingBoxInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShippingBoxInfoQuery(get_called_class());
    }
}
