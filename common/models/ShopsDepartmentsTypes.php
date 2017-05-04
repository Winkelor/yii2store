<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shops_departments_types}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $comment
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopsDepartments[] $shopsDepartments
 * @property TransShopsDepartmentsTypes[] $transShopsDepartmentsTypes
 */
class ShopsDepartmentsTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shops_departments_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shops_departments_types', 'ID'),
            'name' => Yii::t('shops_departments_types', 'Name'),
            'comment' => Yii::t('shops_departments_types', 'Comment'),
            'is_active' => Yii::t('shops_departments_types', 'Is Active'),
            'created_at' => Yii::t('shops_departments_types', 'Created At'),
            'updated_at' => Yii::t('shops_departments_types', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartments()
    {
        return $this->hasMany(ShopsDepartments::className(), ['type_id' => 'id'])->inverseOf('type');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopsDepartmentsTypes()
    {
        return $this->hasMany(TransShopsDepartmentsTypes::className(), ['shops_departments_types_id' => 'id'])->inverseOf('shopsDepartmentsTypes');
    }

    /**
     * @inheritdoc
     * @return ShopsDepartmentsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopsDepartmentsTypesQuery(get_called_class());
    }
}
