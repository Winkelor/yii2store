<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_attributes_categories}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $attributes_categories_id
 * @property string $name
 * @property string $description
 *
 * @property AttributesCategories $attributesCategories
 * @property Languages $lang
 */
class TransAttributesCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_attributes_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'attributes_categories_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['attributes_categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesCategories::className(), 'targetAttribute' => ['attributes_categories_id' => 'id']],
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
            'attributes_categories_id' => Yii::t('translate', 'Attributes Categories ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesCategories()
    {
        return $this->hasOne(AttributesCategories::className(), ['id' => 'attributes_categories_id'])->inverseOf('transAttributesCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transAttributesCategories');
    }

    /**
     * @inheritdoc
     * @return TransAttributesCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransAttributesCategoriesQuery(get_called_class());
    }
}
