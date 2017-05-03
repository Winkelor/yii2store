<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image_info_attributes_products}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $image_info_id
 * @property integer $attribute_product_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesProducts $attributeProduct
 * @property ImageInfo $imageInfo
 * @property Shops $shop
 */
class ImageInfoAttributesProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image_info_attributes_products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'image_info_id', 'attribute_product_id', 'created_at', 'updated_at'], 'integer'],
            [['attribute_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesProducts::className(), 'targetAttribute' => ['attribute_product_id' => 'id']],
            [['image_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageInfo::className(), 'targetAttribute' => ['image_info_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('image_info_attributes_products', 'ID'),
            'shop_id' => Yii::t('image_info_attributes_products', 'Shop ID'),
            'image_info_id' => Yii::t('image_info_attributes_products', 'Image Info ID'),
            'attribute_product_id' => Yii::t('image_info_attributes_products', 'Attribute Product ID'),
            'created_at' => Yii::t('image_info_attributes_products', 'Created At'),
            'updated_at' => Yii::t('image_info_attributes_products', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeProduct()
    {
        return $this->hasOne(AttributesProducts::className(), ['id' => 'attribute_product_id'])->inverseOf('imageInfoAttributesProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfo()
    {
        return $this->hasOne(ImageInfo::className(), ['id' => 'image_info_id'])->inverseOf('imageInfoAttributesProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('imageInfoAttributesProducts');
    }

    /**
     * @inheritdoc
     * @return ImageInfoAttributesProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageInfoAttributesProductsQuery(get_called_class());
    }
}
