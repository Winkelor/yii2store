<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attributes_categories}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property integer $rank
 * @property integer $attribute_type_id
 * @property integer $attribute_group_id
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesGroups $attributeGroup
 * @property AttributesTypes $attributeType
 * @property Categories $category
 * @property Shops $shop
 * @property AttributesProductsGroup[] $attributesProductsGroups
 * @property TransAttributesCategories[] $transAttributesCategories
 */
class AttributesCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attributes_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'category_id', 'rank', 'attribute_type_id', 'attribute_group_id', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['attribute_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesGroups::className(), 'targetAttribute' => ['attribute_group_id' => 'id']],
            [['attribute_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesTypes::className(), 'targetAttribute' => ['attribute_type_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('attributes_categories', 'ID'),
            'shop_id' => Yii::t('attributes_categories', 'Shop ID'),
            'category_id' => Yii::t('attributes_categories', 'Category ID'),
            'name' => Yii::t('attributes_categories', 'Name'),
            'description' => Yii::t('attributes_categories', 'Description'),
            'rank' => Yii::t('attributes_categories', 'Rank'),
            'attribute_type_id' => Yii::t('attributes_categories', 'Attribute Type ID'),
            'attribute_group_id' => Yii::t('attributes_categories', 'Attribute Group ID'),
            'is_active' => Yii::t('attributes_categories', 'Is Active'),
            'created_at' => Yii::t('attributes_categories', 'Created At'),
            'updated_at' => Yii::t('attributes_categories', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeGroup()
    {
        return $this->hasOne(AttributesGroups::className(), ['id' => 'attribute_group_id'])->inverseOf('attributesCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeType()
    {
        return $this->hasOne(AttributesTypes::className(), ['id' => 'attribute_type_id'])->inverseOf('attributesCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id'])->inverseOf('attributesCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('attributesCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroups()
    {
        return $this->hasMany(AttributesProductsGroup::className(), ['attribute_category_id' => 'id'])->inverseOf('attributeCategory');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAttributesCategories()
    {
        return $this->hasMany(TransAttributesCategories::className(), ['attributes_categories_id' => 'id'])->inverseOf('attributesCategories');
    }

    /**
     * @inheritdoc
     * @return AttributesCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttributesCategoriesQuery(get_called_class());
    }
}
