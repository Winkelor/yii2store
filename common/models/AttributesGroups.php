<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attributes_groups}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property integer $rank
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesCategories[] $attributesCategories
 * @property Categories $category
 * @property Shops $shop
 * @property TransAttributesGroups[] $transAttributesGroups
 */
class AttributesGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attributes_groups}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'category_id', 'rank', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
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
            'id' => Yii::t('attributes_groups', 'ID'),
            'shop_id' => Yii::t('attributes_groups', 'Shop ID'),
            'category_id' => Yii::t('attributes_groups', 'Category ID'),
            'name' => Yii::t('attributes_groups', 'Name'),
            'description' => Yii::t('attributes_groups', 'Description'),
            'rank' => Yii::t('attributes_groups', 'Rank'),
            'is_active' => Yii::t('attributes_groups', 'Is Active'),
            'created_at' => Yii::t('attributes_groups', 'Created At'),
            'updated_at' => Yii::t('attributes_groups', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesCategories()
    {
        return $this->hasMany(AttributesCategories::className(), ['attribute_group_id' => 'id'])->inverseOf('attributeGroup');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id'])->inverseOf('attributesGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('attributesGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAttributesGroups()
    {
        return $this->hasMany(TransAttributesGroups::className(), ['attributes_groups_id' => 'id'])->inverseOf('attributesGroups');
    }

    /**
     * @inheritdoc
     * @return AttributesGroupsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttributesGroupsQuery(get_called_class());
    }
}
