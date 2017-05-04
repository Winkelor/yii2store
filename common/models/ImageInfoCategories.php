<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image_info_categories}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $image_info_id
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Categories $category
 * @property ImageInfo $imageInfo
 * @property Shops $shop
 */
class ImageInfoCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image_info_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'image_info_id', 'category_id', 'created_at', 'updated_at'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'id' => Yii::t('image_info_categories', 'ID'),
            'shop_id' => Yii::t('image_info_categories', 'Shop ID'),
            'image_info_id' => Yii::t('image_info_categories', 'Image Info ID'),
            'category_id' => Yii::t('image_info_categories', 'Category ID'),
            'created_at' => Yii::t('image_info_categories', 'Created At'),
            'updated_at' => Yii::t('image_info_categories', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id'])->inverseOf('imageInfoCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfo()
    {
        return $this->hasOne(ImageInfo::className(), ['id' => 'image_info_id'])->inverseOf('imageInfoCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('imageInfoCategories');
    }

    /**
     * @inheritdoc
     * @return ImageInfoCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageInfoCategoriesQuery(get_called_class());
    }
}
