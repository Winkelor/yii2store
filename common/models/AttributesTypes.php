<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attributes_types}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $db_type
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesCategories[] $attributesCategories
 * @property TransAttributesTypes[] $transAttributesTypes
 */
class AttributesTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attributes_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'db_type', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('attributes_types', 'ID'),
            'name' => Yii::t('attributes_types', 'Name'),
            'db_type' => Yii::t('attributes_types', 'Db Type'),
            'description' => Yii::t('attributes_types', 'Description'),
            'created_at' => Yii::t('attributes_types', 'Created At'),
            'updated_at' => Yii::t('attributes_types', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesCategories()
    {
        return $this->hasMany(AttributesCategories::className(), ['attribute_type_id' => 'id'])->inverseOf('attributeType');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAttributesTypes()
    {
        return $this->hasMany(TransAttributesTypes::className(), ['attributes_types_id' => 'id'])->inverseOf('attributesTypes');
    }

    /**
     * @inheritdoc
     * @return AttributesTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttributesTypesQuery(get_called_class());
    }
}
