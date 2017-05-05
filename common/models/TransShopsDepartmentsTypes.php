<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_shops_departments_types}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $shops_departments_types_id
 * @property string $name
 * @property string $comment
 *
 * @property ShopsDepartmentsTypes $shopsDepartmentsTypes
 * @property Languages $lang
 */
class TransShopsDepartmentsTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_shops_departments_types}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'shops_departments_types_id'], 'integer'],
            [['name', 'comment'], 'string', 'max' => 255],
            [['shops_departments_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartmentsTypes::className(), 'targetAttribute' => ['shops_departments_types_id' => 'id']],
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
            'shops_departments_types_id' => Yii::t('translate', 'Shops Departments Types ID'),
            'name' => Yii::t('translate', 'Name'),
            'comment' => Yii::t('translate', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopsDepartmentsTypes()
    {
        return $this->hasOne(ShopsDepartmentsTypes::className(), ['id' => 'shops_departments_types_id'])->inverseOf('transShopsDepartmentsTypes');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transShopsDepartmentsTypes');
    }

    /**
     * @inheritdoc
     * @return TransShopsDepartmentsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransShopsDepartmentsTypesQuery(get_called_class());
    }
}
