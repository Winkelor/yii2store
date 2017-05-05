<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_usr_accounts_types}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $usr_accounts_types_id
 * @property string $name
 *
 * @property Languages $lang
 * @property UsrAccountsTypes $usrAccountsTypes
 */
class TransUsrAccountsTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_usr_accounts_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'usr_accounts_types_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['usr_accounts_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsrAccountsTypes::className(), 'targetAttribute' => ['usr_accounts_types_id' => 'id']],
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
            'usr_accounts_types_id' => Yii::t('translate', 'Usr Accounts Types ID'),
            'name' => Yii::t('translate', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transUsrAccountsTypes');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsrAccountsTypes()
    {
        return $this->hasOne(UsrAccountsTypes::className(), ['id' => 'usr_accounts_types_id'])->inverseOf('transUsrAccountsTypes');
    }

    /**
     * @inheritdoc
     * @return TransUsrAccountsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransUsrAccountsTypesQuery(get_called_class());
    }
}
