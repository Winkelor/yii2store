<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shipping_box_info_type_package}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShippingBoxInfo[] $shippingBoxInfos
 */
class ShippingBoxInfoTypePackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shipping_box_info_type_package}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shipping_box_info_type_package', 'ID'),
            'name' => Yii::t('shipping_box_info_type_package', 'Name'),
            'description' => Yii::t('shipping_box_info_type_package', 'Description'),
            'is_active' => Yii::t('shipping_box_info_type_package', 'Is Active'),
            'created_at' => Yii::t('shipping_box_info_type_package', 'Created At'),
            'updated_at' => Yii::t('shipping_box_info_type_package', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingBoxInfos()
    {
        return $this->hasMany(ShippingBoxInfo::className(), ['type_package_id' => 'id'])->inverseOf('typePackage');
    }

    /**
     * @inheritdoc
     * @return ShippingBoxInfoTypePackageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShippingBoxInfoTypePackageQuery(get_called_class());
    }
}
