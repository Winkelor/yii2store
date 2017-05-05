<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_global_categories}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $global_categories_id
 * @property string $name
 * @property string $description
 *
 * @property GlobalCategories $globalCategories
 * @property Languages $lang
 */
class TransGlobalCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_global_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'global_categories_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['global_categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => GlobalCategories::className(), 'targetAttribute' => ['global_categories_id' => 'id']],
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
            'global_categories_id' => Yii::t('translate', 'Global Categories ID'),
            'name' => Yii::t('translate', 'Name'),
            'description' => Yii::t('translate', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGlobalCategories()
    {
        return $this->hasOne(GlobalCategories::className(), ['id' => 'global_categories_id'])->inverseOf('transGlobalCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transGlobalCategories');
    }

    /**
     * @inheritdoc
     * @return TransGlobalCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransGlobalCategoriesQuery(get_called_class());
    }
}
