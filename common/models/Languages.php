<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%languages}}".
 *
 * @property integer $id
 * @property string $en_name
 * @property string $iso639_1
 * @property string $native_name
 * @property string $native_name_short
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cultures[] $cultures
 * @property TransAddresses[] $transAddresses
 * @property TransAttributesCategories[] $transAttributesCategories
 * @property TransAttributesGroups[] $transAttributesGroups
 * @property TransAttributesProducts[] $transAttributesProducts
 * @property TransAttributesTypes[] $transAttributesTypes
 * @property TransCartDetailsStatus[] $transCartDetailsStatuses
 * @property TransCategories[] $transCategories
 * @property TransContacts[] $transContacts
 * @property TransCountries[] $transCountries
 * @property TransCultures[] $transCultures
 * @property TransCurrencies[] $transCurrencies
 * @property TransGlobalCategories[] $transGlobalCategories
 * @property TransImageInfo[] $transImageInfos
 * @property TransImageTypes[] $transImageTypes
 * @property TransOrderComments[] $transOrderComments
 * @property TransOrderStatuses[] $transOrderStatuses
 * @property TransOrders[] $transOrders
 * @property TransOrdersDetailsStatus[] $transOrdersDetailsStatuses
 * @property TransProductStatus[] $transProductStatuses
 * @property TransProducts[] $transProducts
 * @property TransProductsAttributesLogisticsInfoStatuses[] $transProductsAttributesLogisticsInfoStatuses
 * @property TransSeoInfo[] $transSeoInfos
 * @property TransShippingInfo[] $transShippingInfos
 * @property TransShippingInfoStatus[] $transShippingInfoStatuses
 * @property TransShopStatuses[] $transShopStatuses
 * @property TransShopTypes[] $transShopTypes
 * @property TransShops[] $transShops
 * @property TransShopsCommerceData[] $transShopsCommerceDatas
 * @property TransShopsDepartments[] $transShopsDepartments
 * @property TransShopsDepartmentsStatuses[] $transShopsDepartmentsStatuses
 * @property TransShopsDepartmentsTypes[] $transShopsDepartmentsTypes
 * @property TransUsrAccountsTypes[] $transUsrAccountsTypes
 * @property TransWishlist[] $transWishlists
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%languages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['en_name', 'iso639_1', 'native_name', 'native_name_short'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('languages', 'ID'),
            'en_name' => Yii::t('languages', 'En Name'),
            'iso639_1' => Yii::t('languages', 'Iso639 1'),
            'native_name' => Yii::t('languages', 'Native Name'),
            'native_name_short' => Yii::t('languages', 'Native Name Short'),
            'created_at' => Yii::t('languages', 'Created At'),
            'updated_at' => Yii::t('languages', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultures()
    {
        return $this->hasMany(Cultures::className(), ['language_id' => 'id'])->inverseOf('language');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAddresses()
    {
        return $this->hasMany(TransAddresses::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAttributesCategories()
    {
        return $this->hasMany(TransAttributesCategories::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAttributesGroups()
    {
        return $this->hasMany(TransAttributesGroups::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAttributesProducts()
    {
        return $this->hasMany(TransAttributesProducts::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAttributesTypes()
    {
        return $this->hasMany(TransAttributesTypes::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCartDetailsStatuses()
    {
        return $this->hasMany(TransCartDetailsStatus::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCategories()
    {
        return $this->hasMany(TransCategories::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransContacts()
    {
        return $this->hasMany(TransContacts::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCountries()
    {
        return $this->hasMany(TransCountries::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCultures()
    {
        return $this->hasMany(TransCultures::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransCurrencies()
    {
        return $this->hasMany(TransCurrencies::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransGlobalCategories()
    {
        return $this->hasMany(TransGlobalCategories::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransImageInfos()
    {
        return $this->hasMany(TransImageInfo::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransImageTypes()
    {
        return $this->hasMany(TransImageTypes::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransOrderComments()
    {
        return $this->hasMany(TransOrderComments::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransOrderStatuses()
    {
        return $this->hasMany(TransOrderStatuses::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransOrders()
    {
        return $this->hasMany(TransOrders::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransOrdersDetailsStatuses()
    {
        return $this->hasMany(TransOrdersDetailsStatus::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransProductStatuses()
    {
        return $this->hasMany(TransProductStatus::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransProducts()
    {
        return $this->hasMany(TransProducts::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransProductsAttributesLogisticsInfoStatuses()
    {
        return $this->hasMany(TransProductsAttributesLogisticsInfoStatuses::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransSeoInfos()
    {
        return $this->hasMany(TransSeoInfo::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShippingInfos()
    {
        return $this->hasMany(TransShippingInfo::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShippingInfoStatuses()
    {
        return $this->hasMany(TransShippingInfoStatus::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopStatuses()
    {
        return $this->hasMany(TransShopStatuses::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopTypes()
    {
        return $this->hasMany(TransShopTypes::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShops()
    {
        return $this->hasMany(TransShops::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopsCommerceDatas()
    {
        return $this->hasMany(TransShopsCommerceData::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopsDepartments()
    {
        return $this->hasMany(TransShopsDepartments::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopsDepartmentsStatuses()
    {
        return $this->hasMany(TransShopsDepartmentsStatuses::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopsDepartmentsTypes()
    {
        return $this->hasMany(TransShopsDepartmentsTypes::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsrAccountsTypes()
    {
        return $this->hasMany(TransUsrAccountsTypes::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransWishlists()
    {
        return $this->hasMany(TransWishlist::className(), ['lang_id' => 'id'])->inverseOf('lang');
    }

    /**
     * @inheritdoc
     * @return LanguagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LanguagesQuery(get_called_class());
    }
}
