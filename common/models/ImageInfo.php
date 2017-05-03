<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image_info}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $image_type_id
 * @property string $name
 * @property string $description
 * @property string $path
 * @property string $alternative_path
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ImageTypes $imageType
 * @property Shops $shop
 * @property ImageInfoAttributesProducts[] $imageInfoAttributesProducts
 * @property ImageInfoCategories[] $imageInfoCategories
 * @property ImageInfoGlobalCategories[] $imageInfoGlobalCategories
 * @property ImageInfoProducts[] $imageInfoProducts
 * @property TransImageInfo[] $transImageInfos
 */
class ImageInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'image_type_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description', 'path', 'alternative_path'], 'string', 'max' => 255],
            [['image_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageTypes::className(), 'targetAttribute' => ['image_type_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('image_info', 'ID'),
            'shop_id' => Yii::t('image_info', 'Shop ID'),
            'image_type_id' => Yii::t('image_info', 'Image Type ID'),
            'name' => Yii::t('image_info', 'Name'),
            'description' => Yii::t('image_info', 'Description'),
            'path' => Yii::t('image_info', 'Path'),
            'alternative_path' => Yii::t('image_info', 'Alternative Path'),
            'created_at' => Yii::t('image_info', 'Created At'),
            'updated_at' => Yii::t('image_info', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageType()
    {
        return $this->hasOne(ImageTypes::className(), ['id' => 'image_type_id'])->inverseOf('imageInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('imageInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoAttributesProducts()
    {
        return $this->hasMany(ImageInfoAttributesProducts::className(), ['image_info_id' => 'id'])->inverseOf('imageInfo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoCategories()
    {
        return $this->hasMany(ImageInfoCategories::className(), ['image_info_id' => 'id'])->inverseOf('imageInfo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoGlobalCategories()
    {
        return $this->hasMany(ImageInfoGlobalCategories::className(), ['image_info_id' => 'id'])->inverseOf('imageInfo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoProducts()
    {
        return $this->hasMany(ImageInfoProducts::className(), ['image_info_id' => 'id'])->inverseOf('imageInfo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransImageInfos()
    {
        return $this->hasMany(TransImageInfo::className(), ['image_info_id' => 'id'])->inverseOf('imageInfo');
    }

    /**
     * @inheritdoc
     * @return ImageInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageInfoQuery(get_called_class());
    }
}
