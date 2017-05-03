<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $global_category_id
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 * @property integer $level_depth
 * @property integer $is_active
 * @property integer $seo_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesCategories[] $attributesCategories
 * @property AttributesGroups[] $attributesGroups
 * @property GlobalCategories $globalCategory
 * @property Categories $parent
 * @property Categories[] $categories
 * @property SeoInfo $seo
 * @property Shops $shop
 * @property ImageInfoCategories[] $imageInfoCategories
 * @property Products[] $products
 * @property TransCategories[] $transCategories
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'global_category_id', 'parent_id', 'level_depth', 'is_active', 'seo_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['global_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => GlobalCategories::className(), 'targetAttribute' => ['global_category_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['seo_id'], 'exist', 'skipOnError' => true, 'targetClass' => SeoInfo::className(), 'targetAttribute' => ['seo_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('categories', 'ID'),
            'shop_id' => Yii::t('categories', 'Shop ID'),
            'global_category_id' => Yii::t('categories', 'Global Category ID'),
            'name' => Yii::t('categories', 'Name'),
            'description' => Yii::t('categories', 'Description'),
            'parent_id' => Yii::t('categories', 'Parent ID'),
            'level_depth' => Yii::t('categories', 'Level Depth'),
            'is_active' => Yii::t('categories', 'Is Active'),
            'seo_id' => Yii::t('categories', 'Seo ID'),
            'created_at' => Yii::t('categories', 'Created At'),
            'updated_at' => Yii::t('categories', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesCategories()
    {
        return $this->hasMany(AttributesCategories::className(), ['category_id' => 'id'])->inverseOf('category');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesGroups()
    {
        return $this->hasMany(AttributesGroups::className(), ['category_id' => 'id'])->inverseOf('category');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGlobalCategory()
    {
        return $this->hasOne(GlobalCategories::className(), ['id' => 'global_category_id'])->inverseOf('categories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Categories::className(), ['id' => 'parent_id'])->inverseOf('categories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['parent_id' => 'id'])->inverseOf('parent');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeo()
    {
        return $this->hasOne(SeoInfo::className(), ['id' => 'seo_id'])->inverseOf('categories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('categories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoCategories()
    {
        return $this->hasMany(ImageInfoCategories::className(), ['category_id' => 'id'])->inverseOf('category');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id'])->inverseOf('category');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCategories()
    {
        return $this->hasMany(TransCategories::className(), ['categories_id' => 'id'])->inverseOf('categories');
    }

    /**
     * @inheritdoc
     * @return CategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriesQuery(get_called_class());
    }
}
