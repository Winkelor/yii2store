<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contacts}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $second_phone
 * @property string $email
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShippingInfo[] $shippingInfos
 * @property Shops[] $shops
 * @property ShopsDepartments[] $shopsDepartments
 * @property TransContacts[] $transContacts
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contacts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'phone', 'second_phone', 'email', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('contacts', 'ID'),
            'name' => Yii::t('contacts', 'Name'),
            'phone' => Yii::t('contacts', 'Phone'),
            'second_phone' => Yii::t('contacts', 'Second Phone'),
            'email' => Yii::t('contacts', 'Email'),
            'description' => Yii::t('contacts', 'Description'),
            'created_at' => Yii::t('contacts', 'Created At'),
            'updated_at' => Yii::t('contacts', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingInfos()
    {
        return $this->hasMany(ShippingInfo::className(), ['contact_id' => 'id'])->inverseOf('contact');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['contact_id' => 'id'])->inverseOf('contact');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartments()
    {
        return $this->hasMany(ShopsDepartments::className(), ['contact_id' => 'id'])->inverseOf('contact');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransContacts()
    {
        return $this->hasMany(TransContacts::className(), ['contacts_id' => 'id'])->inverseOf('contacts');
    }

    /**
     * @inheritdoc
     * @return ContactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactsQuery(get_called_class());
    }
}
