<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image_info_global_categories}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $image_info_id
 * @property integer $global_category_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property GlobalCategories $globalCategory
 * @property ImageInfo $imageInfo
 * @property Shops $shop
 */
class ImageInfoGlobalCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image_info_global_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'image_info_id', 'global_category_id', 'created_at', 'updated_at'], 'integer'],
            [['global_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => GlobalCategories::className(), 'targetAttribute' => ['global_category_id' => 'id']],
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
            'id' => Yii::t('image_info_global_categories', 'ID'),
            'shop_id' => Yii::t('image_info_global_categories', 'Shop ID'),
            'image_info_id' => Yii::t('image_info_global_categories', 'Image Info ID'),
            'global_category_id' => Yii::t('image_info_global_categories', 'Global Category ID'),
            'created_at' => Yii::t('image_info_global_categories', 'Created At'),
            'updated_at' => Yii::t('image_info_global_categories', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGlobalCategory()
    {
        return $this->hasOne(GlobalCategories::className(), ['id' => 'global_category_id'])->inverseOf('imageInfoGlobalCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfo()
    {
        return $this->hasOne(ImageInfo::className(), ['id' => 'image_info_id'])->inverseOf('imageInfoGlobalCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('imageInfoGlobalCategories');
    }

    /**
     * @inheritdoc
     * @return ImageInfoGlobalCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageInfoGlobalCategoriesQuery(get_called_class());
    }
}
