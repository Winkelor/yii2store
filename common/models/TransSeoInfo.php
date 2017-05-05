<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_seo_info}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $seo_info_id
 * @property string $meta_header
 * @property string $meta_description
 * @property string $human_readable_url
 *
 * @property Languages $lang
 * @property SeoInfo $seoInfo
 */
class TransSeoInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_seo_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'seo_info_id'], 'integer'],
            [['meta_header', 'meta_description', 'human_readable_url'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['seo_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => SeoInfo::className(), 'targetAttribute' => ['seo_info_id' => 'id']],
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
            'seo_info_id' => Yii::t('translate', 'Seo Info ID'),
            'meta_header' => Yii::t('translate', 'Meta Header'),
            'meta_description' => Yii::t('translate', 'Meta Description'),
            'human_readable_url' => Yii::t('translate', 'Human Readable Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transSeoInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeoInfo()
    {
        return $this->hasOne(SeoInfo::className(), ['id' => 'seo_info_id'])->inverseOf('transSeoInfos');
    }

    /**
     * @inheritdoc
     * @return TransSeoInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransSeoInfoQuery(get_called_class());
    }
}
