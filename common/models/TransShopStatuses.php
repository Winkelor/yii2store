<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shop_statuses}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shop_statuses_id
 * @property string $name
 * @property string $comment
 *
 * @property Languages $lang
 * @property ShopStatuses $shopStatuses
 */
class TransShopStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shop_statuses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shop_statuses_id'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['shop_statuses_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopStatuses::className(), 'targetAttribute' => ['shop_statuses_id' => 'id']],
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
            'shop_statuses_id' => Yii::t('translate', 'Shop Statuses ID'),
            'name' => Yii::t('translate', 'Name'),
            'comment' => Yii::t('translate', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShopStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopStatuses()
    {
        return $this->hasOne(ShopStatuses::className(), ['id' => 'shop_statuses_id'])->inverseOf('transShopStatuses');
    }

    /**
     * @inheritdoc
     * @return TransShopStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShopStatusesQuery(get_called_class());
    }
}
