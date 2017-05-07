<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_client}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $account_type_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cart[] $carts
 * @property CartDetails[] $cartDetails
 * @property Orders[] $orders
 * @property OrdersDetails[] $ordersDetails
 * @property ProductsComments[] $productsComments
 * @property UsrAccountsTypes $accountType
 * @property Wishlist[] $wishlists
 * @property WishlistDetails[] $wishlistDetails
 */
class UserClient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_client}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['account_type_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['account_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsrAccountsTypes::className(), 'targetAttribute' => ['account_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user_client', 'ID'),
            'username' => Yii::t('user_client', 'Username'),
            'auth_key' => Yii::t('user_client', 'Auth Key'),
            'password_hash' => Yii::t('user_client', 'Password Hash'),
            'password_reset_token' => Yii::t('user_client', 'Password Reset Token'),
            'email' => Yii::t('user_client', 'Email'),
            'account_type_id' => Yii::t('user_client', 'Account Type ID'),
            'status' => Yii::t('user_client', 'Status'),
            'created_at' => Yii::t('user_client', 'Created At'),
            'updated_at' => Yii::t('user_client', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['user_client_id' => 'id'])->inverseOf('userClient');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetails()
    {
        return $this->hasMany(CartDetails::className(), ['user_client_id' => 'id'])->inverseOf('userClient');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['user_client_id' => 'id'])->inverseOf('userClient');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['user_client_id' => 'id'])->inverseOf('userClient');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsComments()
    {
        return $this->hasMany(ProductsComments::className(), ['user_client_id' => 'id'])->inverseOf('userClient');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountType()
    {
        return $this->hasOne(UsrAccountsTypes::className(), ['id' => 'account_type_id'])->inverseOf('userClients');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlists()
    {
        return $this->hasMany(Wishlist::className(), ['user_client_id' => 'id'])->inverseOf('userClient');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlistDetails()
    {
        return $this->hasMany(WishlistDetails::className(), ['user_client_id' => 'id'])->inverseOf('userClient');
    }

    /**
     * @inheritdoc
     * @return UserClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserClientQuery(get_called_class());
    }
}
