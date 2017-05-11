<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shops_managers}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $manager_id
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property UserAdmin $manager
 * @property Shops $shop
 */
class ShopsManagers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shops_managers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'manager_id', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAdmin::className(), 'targetAttribute' => ['manager_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shops_manager', 'ID'),
            'shop_id' => Yii::t('shops_manager', 'Shop ID'),
            'manager_id' => Yii::t('shops_manager', 'Manager ID'),
            'comment' => Yii::t('shops_manager', 'Comment'),
            'created_at' => Yii::t('shops_manager', 'Created At'),
            'updated_at' => Yii::t('shops_manager', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(UserAdmin::className(), ['id' => 'manager_id'])->inverseOf('shopsManagers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('shopsManagers');
    }

    /**
     * @inheritdoc
     * @return ShopsManagersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopsManagersQuery(get_called_class());
    }
}
