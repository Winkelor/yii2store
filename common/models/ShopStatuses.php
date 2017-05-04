<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shop_statuses}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $comment
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Shops[] $shops
 * @property TransShopStatuses[] $transShopStatuses
 */
class ShopStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_statuses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop_statuses', 'ID'),
            'name' => Yii::t('shop_statuses', 'Name'),
            'comment' => Yii::t('shop_statuses', 'Comment'),
            'is_active' => Yii::t('shop_statuses', 'Is Active'),
            'created_at' => Yii::t('shop_statuses', 'Created At'),
            'updated_at' => Yii::t('shop_statuses', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['status_id' => 'id'])->inverseOf('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransShopStatuses()
    {
        return $this->hasMany(TransShopStatuses::className(), ['shop_statuses_id' => 'id'])->inverseOf('shopStatuses');
    }

    /**
     * @inheritdoc
     * @return ShopStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopStatusesQuery(get_called_class());
    }
}
