<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shops_departments}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shops_departments_id
 * @property string $name
 * @property string $short_name
 *
 * @property Languages $lang
 * @property ShopsDepartments $shopsDepartments
 */
class TransShopsDepartments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shops_departments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shops_departments_id'], 'integer'],
            [['name', 'short_name'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['shops_departments_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['shops_departments_id' => 'id']],
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
            'shops_departments_id' => Yii::t('translate', 'Shops Departments ID'),
            'name' => Yii::t('translate', 'Name'),
            'short_name' => Yii::t('translate', 'Short Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShopsDepartments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartments()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'shops_departments_id'])->inverseOf('transShopsDepartments');
    }

    /**
     * @inheritdoc
     * @return TransShopsDepartmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShopsDepartmentsQuery(get_called_class());
    }
}
