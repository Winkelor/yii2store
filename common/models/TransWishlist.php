<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_wishlist}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $wishlist_id
 * @property string $name
 * @property string $description
 *
 * @property Languages $lang
 * @property Wishlist $wishlist
 */
class TransWishlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_wishlist}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'wishlist_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['wishlist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wishlist::className(), 'targetAttribute' => ['wishlist_id' => 'id']],
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
            'wishlist_id' => Yii::t('translate', 'Wishlist ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transWishlists');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlist()
    {
        return $this->hasOne(Wishlist::className(), ['id' => 'wishlist_id'])->inverseOf('transWishlists');
    }

    /**
     * @inheritdoc
     * @return TransWishlistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransWishlistQuery(get_called_class());
    }
}
