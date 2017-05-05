<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shops_departments_statuses}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shops_departments_statuses_id
 * @property string $name
 * @property string $comment
 *
 * @property ShopsDepartmentsStatuses $shopsDepartmentsStatuses
 * @property Languages $lang
 */
class TransShopsDepartmentsStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shops_departments_statuses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shops_departments_statuses_id'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
            [['shops_departments_statuses_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartmentsStatuses::className(), 'targetAttribute' => ['shops_departments_statuses_id' => 'id']],
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
            'shops_departments_statuses_id' => Yii::t('translate', 'Shops Departments Statuses ID'),
            'name' => Yii::t('translate', 'Name'),
            'comment' => Yii::t('translate', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartmentsStatuses()
    {
        return $this->hasOne(ShopsDepartmentsStatuses::className(), ['id' => 'shops_departments_statuses_id'])->inverseOf('transShopsDepartmentsStatuses');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShopsDepartmentsStatuses');
    }

    /**
     * @inheritdoc
     * @return TransShopsDepartmentsStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShopsDepartmentsStatusesQuery(get_called_class());
    }
}
