<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%global_categories}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 * @property integer $level_depth
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Categories[] $categories
 * @property GlobalCategories $parent
 * @property GlobalCategories[] $globalCategories
 * @property ImageInfoGlobalCategories[] $imageInfoGlobalCategories
 * @property TransGlobalCategories[] $transGlobalCategories
 */
class GlobalCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%global_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'level_depth', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => GlobalCategories::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('global_categories', 'ID'),
            'name' => Yii::t('global_categories', 'Name'),
            'description' => Yii::t('global_categories', 'Description'),
            'parent_id' => Yii::t('global_categories', 'Parent ID'),
            'level_depth' => Yii::t('global_categories', 'Level Depth'),
            'is_active' => Yii::t('global_categories', 'Is Active'),
            'created_at' => Yii::t('global_categories', 'Created At'),
            'updated_at' => Yii::t('global_categories', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['global_category_id' => 'id'])->inverseOf('globalCategory');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(GlobalCategories::className(), ['id' => 'parent_id'])->inverseOf('globalCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGlobalCategories()
    {
        return $this->hasMany(GlobalCategories::className(), ['parent_id' => 'id'])->inverseOf('parent');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoGlobalCategories()
    {
        return $this->hasMany(ImageInfoGlobalCategories::className(), ['global_category_id' => 'id'])->inverseOf('globalCategory');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransGlobalCategories()
    {
        return $this->hasMany(TransGlobalCategories::className(), ['global_categories_id' => 'id'])->inverseOf('globalCategories');
    }

    /**
     * @inheritdoc
     * @return GlobalCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GlobalCategoriesQuery(get_called_class());
    }
}
