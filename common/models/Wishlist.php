<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%wishlist}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $public
 * @property integer $user_client_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property TransWishlist[] $transWishlists
 * @property UserClient $userClient
 * @property WishlistDetails[] $wishlistDetails
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wishlist}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['public', 'user_client_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['user_client_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserClient::className(), 'targetAttribute' => ['user_client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('wishlist', 'ID'),
            'name' => Yii::t('wishlist', 'Name'),
            'description' => Yii::t('wishlist', 'Description'),
            'public' => Yii::t('wishlist', 'Public'),
            'user_client_id' => Yii::t('wishlist', 'User Client ID'),
            'created_at' => Yii::t('wishlist', 'Created At'),
            'updated_at' => Yii::t('wishlist', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransWishlists()
    {
        return $this->hasMany(TransWishlist::className(), ['wishlist_id' => 'id'])->inverseOf('wishlist');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserClient()
    {
        return $this->hasOne(UserClient::className(), ['id' => 'user_client_id'])->inverseOf('wishlists');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlistDetails()
    {
        return $this->hasMany(WishlistDetails::className(), ['wishlist_id' => 'id'])->inverseOf('wishlist');
    }

    /**
     * @inheritdoc
     * @return WishlistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WishlistQuery(get_called_class());
    }
}
