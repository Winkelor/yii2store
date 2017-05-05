<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_attributes_products}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $attributes_products_id
 * @property string $value
 *
 * @property AttributesProducts $attributesProducts
 * @property Languages $lang
 */
class TransAttributesProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_attributes_products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'attributes_products_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['attributes_products_id'], 'exist', 'skipOnError' => true, 'targetClass' => AttributesProducts::className(), 'targetAttribute' => ['attributes_products_id' => 'id']],
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
            'attributes_products_id' => Yii::t('translate', 'Attributes Products ID'),
            'value' => Yii::t('translate', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProducts()
    {
        return $this->hasOne(AttributesProducts::className(), ['id' => 'attributes_products_id'])->inverseOf('transAttributesProducts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transAttributesProducts');
    }

    /**
     * @inheritdoc
     * @return TransAttributesProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransAttributesProductsQuery(get_called_class());
    }
}
