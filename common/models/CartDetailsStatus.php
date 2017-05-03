<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cart_details_status}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property CartDetails[] $cartDetails
 * @property TransCartDetailsStatus[] $transCartDetailsStatuses
 */
class CartDetailsStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cart_details_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cart_details_status', 'ID'),
            'name' => Yii::t('cart_details_status', 'Name'),
            'description' => Yii::t('cart_details_status', 'Description'),
            'is_active' => Yii::t('cart_details_status', 'Is Active'),
            'created_at' => Yii::t('cart_details_status', 'Created At'),
            'updated_at' => Yii::t('cart_details_status', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetails()
    {
        return $this->hasMany(CartDetails::className(), ['status_id' => 'id'])->inverseOf('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCartDetailsStatuses()
    {
        return $this->hasMany(TransCartDetailsStatus::className(), ['cart_details_status_id' => 'id'])->inverseOf('cartDetailsStatus');
    }

    /**
     * @inheritdoc
     * @return CartDetailsStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CartDetailsStatusQuery(get_called_class());
    }
}
