<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image_types}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_action
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ImageInfo[] $imageInfos
 * @property TransImageTypes[] $transImageTypes
 */
class ImageTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_action', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('image_types', 'ID'),
            'name' => Yii::t('image_types', 'Name'),
            'description' => Yii::t('image_types', 'Description'),
            'is_action' => Yii::t('image_types', 'Is Action'),
            'created_at' => Yii::t('image_types', 'Created At'),
            'updated_at' => Yii::t('image_types', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfos()
    {
        return $this->hasMany(ImageInfo::className(), ['image_type_id' => 'id'])->inverseOf('imageType');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransImageTypes()
    {
        return $this->hasMany(TransImageTypes::className(), ['image_types_id' => 'id'])->inverseOf('imageTypes');
    }

    /**
     * @inheritdoc
     * @return ImageTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageTypesQuery(get_called_class());
    }
}
