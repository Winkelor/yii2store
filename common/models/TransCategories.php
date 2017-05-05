<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_categories}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $categories_id
 * @property string $name
 * @property string $description
 *
 * @property Categories $categories
 * @property Languages $lang
 */
class TransCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'categories_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['categories_id' => 'id']],
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
            'categories_id' => Yii::t('translate', 'Categories ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'categories_id'])->inverseOf('transCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transCategories');
    }

    /**
     * @inheritdoc
     * @return TransCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransCategoriesQuery(get_called_class());
    }
}
