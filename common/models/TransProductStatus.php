<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_product_status}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $product_status_id
 * @property string $name
 * @property string $description
 *
 * @property Languages $lang
 * @property ProductStatus $productStatus
 */
class TransProductStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_product_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'product_status_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['product_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductStatus::className(), 'targetAttribute' => ['product_status_id' => 'id']],
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
            'product_status_id' => Yii::t('translate', 'Product Status ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transProductStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductStatus()
    {
        return $this->hasOne(ProductStatus::className(), ['id' => 'product_status_id'])->inverseOf('transProductStatuses');
    }

    /**
     * @inheritdoc
     * @return TransProductStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransProductStatusQuery(get_called_class());
    }
}
