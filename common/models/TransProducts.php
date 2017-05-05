<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_products}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $products_id
 * @property string $vendor_code
 * @property string $name
 * @property string $short_description
 * @property string $description
 *
 * @property Languages $lang
 * @property Products $products
 */
class TransProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'products_id'], 'integer'],
            [['vendor_code', 'name', 'short_description', 'description'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['products_id' => 'id']],
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
            'products_id' => Yii::t('translate', 'Products ID'),
            'vendor_code' => Yii::t('translate', 'Vendor Code'),
            'name' => Yii::t('translate', 'Name'),
            'short_description' => Yii::t('translate', 'Short Description'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'products_id'])->inverseOf('transProducts');
    }

    /**
     * @inheritdoc
     * @return TransProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransProductsQuery(get_called_class());
    }
}
