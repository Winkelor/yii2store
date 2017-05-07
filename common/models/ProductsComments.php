<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%products_comments}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $product_id
 * @property integer $user_client_id
 * @property integer $parent_id
 * @property string $comment
 * @property integer $status_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopsDepartments $department
 * @property ProductsComments $parent
 * @property ProductsComments[] $productsComments
 * @property Products $product
 * @property Shops $shop
 * @property ProductsComments $status
 * @property ProductsComments[] $productsComments0
 * @property UserClient $userClient
 */
class ProductsComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products_comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'product_id', 'user_client_id', 'parent_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsComments::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsComments::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_client_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserClient::className(), 'targetAttribute' => ['user_client_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('products_comments', 'ID'),
            'shop_id' => Yii::t('products_comments', 'Shop ID'),
            'department_id' => Yii::t('products_comments', 'Department ID'),
            'product_id' => Yii::t('products_comments', 'Product ID'),
            'user_client_id' => Yii::t('products_comments', 'User Client ID'),
            'parent_id' => Yii::t('products_comments', 'Parent ID'),
            'comment' => Yii::t('products_comments', 'Comment'),
            'status_id' => Yii::t('products_comments', 'Status ID'),
            'created_at' => Yii::t('products_comments', 'Created At'),
            'updated_at' => Yii::t('products_comments', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('productsComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ProductsComments::className(), ['id' => 'parent_id'])->inverseOf('productsComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsComments()
    {
        return $this->hasMany(ProductsComments::className(), ['parent_id' => 'id'])->inverseOf('parent');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id'])->inverseOf('productsComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('productsComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ProductsComments::className(), ['id' => 'status_id'])->inverseOf('productsComments0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsComments0()
    {
        return $this->hasMany(ProductsComments::className(), ['status_id' => 'id'])->inverseOf('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserClient()
    {
        return $this->hasOne(UserClient::className(), ['id' => 'user_client_id'])->inverseOf('productsComments');
    }

    /**
     * @inheritdoc
     * @return ProductsCommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsCommentsQuery(get_called_class());
    }
}
