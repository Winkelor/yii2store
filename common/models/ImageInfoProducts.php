<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image_info_products}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $image_info_id
 * @property integer $product_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ImageInfo $imageInfo
 * @property Products $product
 * @property Shops $shop
 */
class ImageInfoProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image_info_products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'image_info_id', 'product_id', 'created_at', 'updated_at'], 'integer'],
            [['image_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageInfo::className(), 'targetAttribute' => ['image_info_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('image_info_products', 'ID'),
            'shop_id' => Yii::t('image_info_products', 'Shop ID'),
            'image_info_id' => Yii::t('image_info_products', 'Image Info ID'),
            'product_id' => Yii::t('image_info_products', 'Product ID'),
            'created_at' => Yii::t('image_info_products', 'Created At'),
            'updated_at' => Yii::t('image_info_products', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfo()
    {
        return $this->hasOne(ImageInfo::className(), ['id' => 'image_info_id'])->inverseOf('imageInfoProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('imageInfoProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('imageInfoProducts');
    }

    /**
     * @inheritdoc
     * @return image_info_products the active query used by this AR class.
     */
    public static function find()
    {
        return new image_info_products(get_called_class());
    }
}
