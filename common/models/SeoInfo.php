<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%seo_info}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $meta_header
 * @property string $meta_description
 * @property string $human_readable_url
 * @property string $other_seo_info
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Categories[] $categories
 * @property Products[] $products
 * @property Shops $shop
 * @property TransSeoInfo[] $transSeoInfos
 */
class SeoInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%seo_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'created_at', 'updated_at'], 'integer'],
            [['other_seo_info'], 'string'],
            [['meta_header', 'meta_description', 'human_readable_url'], 'string', 'max' => 255],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('seo_info', 'ID'),
            'shop_id' => Yii::t('seo_info', 'Shop ID'),
            'meta_header' => Yii::t('seo_info', 'Meta Header'),
            'meta_description' => Yii::t('seo_info', 'Meta Description'),
            'human_readable_url' => Yii::t('seo_info', 'Human Readable Url'),
            'other_seo_info' => Yii::t('seo_info', 'Other Seo Info'),
            'created_at' => Yii::t('seo_info', 'Created At'),
            'updated_at' => Yii::t('seo_info', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['seo_id' => 'id'])->inverseOf('seo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['seo_id' => 'id'])->inverseOf('seo');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('seoInfos');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransSeoInfos()
    {
        return $this->hasMany(TransSeoInfo::className(), ['seo_info_id' => 'id'])->inverseOf('seoInfo');
    }

    /**
     * @inheritdoc
     * @return SeoInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SeoInfoQuery(get_called_class());
    }
}
