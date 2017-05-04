<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_admin}}".
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
 * @property OrderComments[] $orderComments
 * @property Shops[] $shops
 * @property ShopsDepartments[] $shopsDepartments
 * @property UsrAccountsTypes $accountType
 */
class UserAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_admin}}';
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
            'id' => Yii::t('user_admin', 'ID'),
            'username' => Yii::t('user_admin', 'Username'),
            'auth_key' => Yii::t('user_admin', 'Auth Key'),
            'password_hash' => Yii::t('user_admin', 'Password Hash'),
            'password_reset_token' => Yii::t('user_admin', 'Password Reset Token'),
            'email' => Yii::t('user_admin', 'Email'),
            'account_type_id' => Yii::t('user_admin', 'Account Type ID'),
            'status' => Yii::t('user_admin', 'Status'),
            'created_at' => Yii::t('user_admin', 'Created At'),
            'updated_at' => Yii::t('user_admin', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComments()
    {
        return $this->hasMany(OrderComments::className(), ['manager_id' => 'id'])->inverseOf('manager');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['main_user_id' => 'id'])->inverseOf('mainUser');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartments()
    {
        return $this->hasMany(ShopsDepartments::className(), ['main_user_id' => 'id'])->inverseOf('mainUser');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountType()
    {
        return $this->hasOne(UsrAccountsTypes::className(), ['id' => 'account_type_id'])->inverseOf('userAdmins');
    }

    /**
     * @inheritdoc
     * @return UserAdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserAdminQuery(get_called_class());
    }
}
