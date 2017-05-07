<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $category_id
 * @property string $vendor_code
 * @property string $name
 * @property string $short_description
 * @property string $description
 * @property string $purchase_price
 * @property string $selling_price
 * @property integer $is_active
 * @property integer $seo_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AttributesProducts[] $attributesProducts
 * @property AttributesProductsGroup[] $attributesProductsGroups
 * @property CartDetails[] $cartDetails
 * @property ImageInfoProducts[] $imageInfoProducts
 * @property OrdersDetails[] $ordersDetails
 * @property ProductStatus[] $productStatuses
 * @property Categories $category
 * @property ShopsDepartments $department
 * @property SeoInfo $seo
 * @property Shops $shop
 * @property ProductsAttributesLogisticsInfo[] $productsAttributesLogisticsInfos
 * @property ProductsComments[] $productsComments
 * @property TransProducts[] $transProducts
 * @property WishlistDetails[] $wishlistDetails
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'category_id', 'is_active', 'seo_id', 'created_at', 'updated_at'], 'integer'],
            [['purchase_price', 'selling_price'], 'number'],
            [['vendor_code', 'name', 'short_description', 'description'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['seo_id'], 'exist', 'skipOnError' => true, 'targetClass' => SeoInfo::className(), 'targetAttribute' => ['seo_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('products', 'ID'),
            'shop_id' => Yii::t('products', 'Shop ID'),
            'department_id' => Yii::t('products', 'Department ID'),
            'category_id' => Yii::t('products', 'Category ID'),
            'vendor_code' => Yii::t('products', 'Vendor Code'),
            'name' => Yii::t('products', 'Name'),
            'short_description' => Yii::t('products', 'Short Description'),
            'description' => Yii::t('products', 'Description'),
            'purchase_price' => Yii::t('products', 'Purchase Price'),
            'selling_price' => Yii::t('products', 'Selling Price'),
            'is_active' => Yii::t('products', 'Is Active'),
            'seo_id' => Yii::t('products', 'Seo ID'),
            'created_at' => Yii::t('products', 'Created At'),
            'updated_at' => Yii::t('products', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProducts()
    {
        return $this->hasMany(AttributesProducts::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributesProductsGroups()
    {
        return $this->hasMany(AttributesProductsGroup::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartDetails()
    {
        return $this->hasMany(CartDetails::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageInfoProducts()
    {
        return $this->hasMany(ImageInfoProducts::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDetails()
    {
        return $this->hasMany(OrdersDetails::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductStatuses()
    {
        return $this->hasMany(ProductStatus::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id'])->inverseOf('products');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('products');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeo()
    {
        return $this->hasOne(SeoInfo::className(), ['id' => 'seo_id'])->inverseOf('products');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('products');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAttributesLogisticsInfos()
    {
        return $this->hasMany(ProductsAttributesLogisticsInfo::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsComments()
    {
        return $this->hasMany(ProductsComments::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransProducts()
    {
        return $this->hasMany(TransProducts::className(), ['products_id' => 'id'])->inverseOf('products');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlistDetails()
    {
        return $this->hasMany(WishlistDetails::className(), ['product_id' => 'id'])->inverseOf('product');
    }

    /**
     * @inheritdoc
     * @return ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsQuery(get_called_class());
    }
}
