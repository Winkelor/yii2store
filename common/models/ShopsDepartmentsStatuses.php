<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shops_departments_statuses}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $comment
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopsDepartments[] $shopsDepartments
 * @property TransShopsDepartmentsStatuses[] $transShopsDepartmentsStatuses
 */
class ShopsDepartmentsStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shops_departments_statuses}}';
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
            'id' => Yii::t('shops_cultures', 'ID'),
            'name' => Yii::t('shops_cultures', 'Name'),
            'comment' => Yii::t('shops_cultures', 'Comment'),
            'is_active' => Yii::t('shops_cultures', 'Is Active'),
            'created_at' => Yii::t('shops_cultures', 'Created At'),
            'updated_at' => Yii::t('shops_cultures', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartments()
    {
        return $this->hasMany(ShopsDepartments::className(), ['status_id' => 'id'])->inverseOf('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopsDepartmentsStatuses()
    {
        return $this->hasMany(TransShopsDepartmentsStatuses::className(), ['shops_departments_statuses_id' => 'id'])->inverseOf('shopsDepartmentsStatuses');
    }

    /**
     * @inheritdoc
     * @return ShopsDepartmentsStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopsDepartmentsStatusesQuery(get_called_class());
    }
}
