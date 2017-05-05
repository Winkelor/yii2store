<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_image_info}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $image_info_id
 * @property string $name
 * @property string $description
 * @property string $path
 * @property string $alternative_path
 *
 * @property ImageInfo $imageInfo
 * @property Languages $lang
 */
class TransImageInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_image_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'image_info_id'], 'integer'],
            [['name', 'description', 'path', 'alternative_path'], 'string', 'max' => 255],
            [['image_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageInfo::className(), 'targetAttribute' => ['image_info_id' => 'id']],
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
            'image_info_id' => Yii::t('translate', 'Image Info ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
            'path' => Yii::t('translate', 'Path'),
            'alternative_path' => Yii::t('translate', 'Alternative Path'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfo()
    {
        return $this->hasOne(ImageInfo::className(), ['id' => 'image_info_id'])->inverseOf('transImageInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transImageInfos');
    }

    /**
     * @inheritdoc
     * @return TransImageInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransImageInfoQuery(get_called_class());
    }
}
