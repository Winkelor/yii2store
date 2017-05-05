<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_attributes_types}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $attributes_types_id
 * @property string $name
 * @property string $db_type
 * @property string $description
 *
 * @property AttributesTypes $attributesTypes
 * @property Languages $lang
 */
class TransAttributesTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_attributes_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'attributes_types_id'], 'integer'],
            [['name', 'db_type', 'description'], 'string', 'max' => 255],
            [['attributes_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesTypes::className(), 'targetAttribute' => ['attributes_types_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translate', 'ID'),
            'lang_id' => Yii::t('translate', 'Lang ID'),
            'attributes_types_id' => Yii::t('translate', 'Attributes Types ID'),
            'name' => Yii::t('translate', 'Name'),
            'db_type' => Yii::t('translate', 'Db Type'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesTypes()
    {
        return $this->hasOne(AttributesTypes::className(), ['id' => 'attributes_types_id'])->inverseOf('transAttributesTypes');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transAttributesTypes');
    }

    /**
     * @inheritdoc
     * @return TransAttributesTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransAttributesTypesQuery(get_called_class());
    }
}
