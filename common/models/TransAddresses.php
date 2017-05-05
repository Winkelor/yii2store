<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_addresses}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $addresses_id
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
 *
 * @property Addresses $addresses
 * @property Languages $lang
 */
class TransAddresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_addresses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'addresses_id'], 'integer'],
            [['name', 'comment', 'phone', 'street', 'build', 'apartments', 'city', 'region', 'state', 'post_index', 'country', 'security_access_code', 'description'], 'string', 'max' => 255],
            [['addresses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Addresses::className(), 'targetAttribute' => ['addresses_id' => 'id']],
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
            'addresses_id' => Yii::t('translate', 'Addresses ID'),
            'name' => Yii::t('translate', 'Name'),
            'comment' => Yii::t('translate', 'Comment'),
            'phone' => Yii::t('translate', 'Phone'),
            'street' => Yii::t('translate', 'Street'),
            'build' => Yii::t('translate', 'Build'),
            'apartments' => Yii::t('translate', 'Apartments'),
            'city' => Yii::t('translate', 'City'),
            'region' => Yii::t('translate', 'Region'),
            'state' => Yii::t('translate', 'State'),
            'post_index' => Yii::t('translate', 'Post Index'),
            'country' => Yii::t('translate', 'Country'),
            'security_access_code' => Yii::t('translate', 'Security Access Code'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasOne(Addresses::className(), ['id' => 'addresses_id'])->inverseOf('transAddresses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transAddresses');
    }

    /**
     * @inheritdoc
     * @return TransAddressesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransAddressesQuery(get_called_class());
    }
}
