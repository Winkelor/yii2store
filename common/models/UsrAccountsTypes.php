<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%usr_accounts_types}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $frontend
 * @property integer $backend
 *
 * @property TransUsrAccountsTypes[] $transUsrAccountsTypes
 * @property UserAdmin[] $userAdmins
 * @property UserClient[] $userClients
 */
class UsrAccountsTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%usr_accounts_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['frontend', 'backend'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('usr_accounts_types', 'ID'),
            'name' => Yii::t('usr_accounts_types', 'Name'),
            'description' => Yii::t('usr_accounts_types', 'Description'),
            'frontend' => Yii::t('usr_accounts_types', 'Frontend'),
            'backend' => Yii::t('usr_accounts_types', 'Backend'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsrAccountsTypes()
    {
        return $this->hasMany(TransUsrAccountsTypes::className(), ['usr_accounts_types_id' => 'id'])->inverseOf('usrAccountsTypes');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAdmins()
    {
        return $this->hasMany(UserAdmin::className(), ['account_type_id' => 'id'])->inverseOf('accountType');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserClients()
    {
        return $this->hasMany(UserClient::className(), ['account_type_id' => 'id'])->inverseOf('accountType');
    }

    /**
     * @inheritdoc
     * @return UsrAccountsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsrAccountsTypesQuery(get_called_class());
    }
}
