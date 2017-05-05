<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_image_types}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $image_types_id
 * @property string $name
 * @property string $description
 *
 * @property ImageTypes $imageTypes
 * @property Languages $lang
 */
class TransImageTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_image_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'image_types_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['image_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageTypes::className(), 'targetAttribute' => ['image_types_id' => 'id']],
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
            'image_types_id' => Yii::t('translate', 'Image Types ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageTypes()
    {
        return $this->hasOne(ImageTypes::className(), ['id' => 'image_types_id'])->inverseOf('transImageTypes');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transImageTypes');
    }

    /**
     * @inheritdoc
     * @return TransImageTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransImageTypesQuery(get_called_class());
    }
}
