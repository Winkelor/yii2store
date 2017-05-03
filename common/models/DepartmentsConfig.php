<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%departments_config}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property string $name
 * @property string $value
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopsDepartments $department
 * @property Shops $shop
 */
class DepartmentsConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%departments_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['name', 'value'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('departments_config', 'ID'),
            'shop_id' => Yii::t('departments_config', 'Shop ID'),
            'department_id' => Yii::t('departments_config', 'Department ID'),
            'name' => Yii::t('departments_config', 'Name'),
            'value' => Yii::t('departments_config', 'Value'),
            'description' => Yii::t('departments_config', 'Description'),
            'created_at' => Yii::t('departments_config', 'Created At'),
            'updated_at' => Yii::t('departments_config', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('departmentsConfigs');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('departmentsConfigs');
    }

    /**
     * @inheritdoc
     * @return DepartmentsConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartmentsConfigQuery(get_called_class());
    }
}
