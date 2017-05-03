<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%addresses}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $comment
 * @property string $phone
 * @property string $street
 * @property string $build
 * @property string $apartments
 * @property string $city
 * @property string $region
 * @property string $state
 * @property string $post_index
 * @property string $country
 * @property string $security_access_code
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShippingInfo[] $shippingInfos
 * @property Shops[] $shops
 * @property ShopsDepartments[] $shopsDepartments
 * @property TransAddresses[] $transAddresses
 */
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%addresses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'comment', 'phone', 'street', 'build', 'apartments', 'city', 'region', 'state', 'post_index', 'country', 'security_access_code', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('addresses', 'ID'),
            'name' => Yii::t('addresses', 'Name'),
            'comment' => Yii::t('addresses', 'Comment'),
            'phone' => Yii::t('addresses', 'Phone'),
            'street' => Yii::t('addresses', 'Street'),
            'build' => Yii::t('addresses', 'Build'),
            'apartments' => Yii::t('addresses', 'Apartments'),
            'city' => Yii::t('addresses', 'City'),
            'region' => Yii::t('addresses', 'Region'),
            'state' => Yii::t('addresses', 'State'),
            'post_index' => Yii::t('addresses', 'Post Index'),
            'country' => Yii::t('addresses', 'Country'),
            'security_access_code' => Yii::t('addresses', 'Security Access Code'),
            'description' => Yii::t('addresses', 'Description'),
            'created_at' => Yii::t('addresses', 'Created At'),
            'updated_at' => Yii::t('addresses', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingInfos()
    {
        return $this->hasMany(ShippingInfo::className(), ['address_id' => 'id'])->inverseOf('address');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['address_id' => 'id'])->inverseOf('address');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartments()
    {
        return $this->hasMany(ShopsDepartments::className(), ['address_id' => 'id'])->inverseOf('address');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAddresses()
    {
        return $this->hasMany(TransAddresses::className(), ['addresses_id' => 'id'])->inverseOf('addresses');
    }

    /**
     * @inheritdoc
     * @return AddressesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressesQuery(get_called_class());
    }
}
