<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_attributes_groups}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $attributes_groups_id
 * @property string $name
 * @property string $description
 *
 * @property AttributesGroups $attributesGroups
 * @property Languages $lang
 */
class TransAttributesGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_attributes_groups}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'attributes_groups_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['attributes_groups_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesGroups::className(), 'targetAttribute' => ['attributes_groups_id' => 'id']],
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
            'attributes_groups_id' => Yii::t('translate', 'Attributes Groups ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesGroups()
    {
        return $this->hasOne(AttributesGroups::className(), ['id' => 'attributes_groups_id'])->inverseOf('transAttributesGroups');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transAttributesGroups');
    }

    /**
     * @inheritdoc
     * @return TransAttributesGroupsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransAttributesGroupsQuery(get_called_class());
    }
}
