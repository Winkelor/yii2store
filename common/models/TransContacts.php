<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_contacts}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $contacts_id
 * @property string $name
 * @property string $phone
 * @property string $second_phone
 * @property string $email
 * @property string $description
 *
 * @property Contacts $contacts
 * @property Languages $lang
 */
class TransContacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_contacts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'contacts_id'], 'integer'],
            [['name', 'phone', 'second_phone', 'email', 'description'], 'string', 'max' => 255],
            [['contacts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacts::className(), 'targetAttribute' => ['contacts_id' => 'id']],
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
            'contacts_id' => Yii::t('translate', 'Contacts ID'),
            'name' => Yii::t('translate', 'Name'),
            'phone' => Yii::t('translate', 'Phone'),
            'second_phone' => Yii::t('translate', 'Second Phone'),
            'email' => Yii::t('translate', 'Email'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contacts_id'])->inverseOf('transContacts');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transContacts');
    }

    /**
     * @inheritdoc
     * @return TransContactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransContactsQuery(get_called_class());
    }
}
