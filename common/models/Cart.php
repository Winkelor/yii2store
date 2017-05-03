<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property integer $id
 * @property integer $user_client_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property UserClient $userClient
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_client_id', 'created_at', 'updated_at'], 'integer'],
            [['user_client_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserClient::className(), 'targetAttribute' => ['user_client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cart', 'ID'),
            'user_client_id' => Yii::t('cart', 'User Client ID'),
            'created_at' => Yii::t('cart', 'Created At'),
            'updated_at' => Yii::t('cart', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserClient()
    {
        return $this->hasOne(UserClient::className(), ['id' => 'user_client_id'])->inverseOf('carts');
    }

    /**
     * @inheritdoc
     * @return CartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CartQuery(get_called_class());
    }
}
