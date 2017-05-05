<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_cart_details_status}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $cart_details_status_id
 * @property string $name
 * @property string $description
 *
 * @property CartDetailsStatus $cartDetailsStatus
 * @property Languages $lang
 */
class TransCartDetailsStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_cart_details_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'cart_details_status_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['cart_details_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => CartDetailsStatus::className(), 'targetAttribute' => ['cart_details_status_id' => 'id']],
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
            'cart_details_status_id' => Yii::t('translate', 'Cart Details Status ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetailsStatus()
    {
        return $this->hasOne(CartDetailsStatus::className(), ['id' => 'cart_details_status_id'])->inverseOf('transCartDetailsStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transCartDetailsStatuses');
    }

    /**
     * @inheritdoc
     * @return TransCartDetailsStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransCartDetailsStatusQuery(get_called_class());
    }
}
