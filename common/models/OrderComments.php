<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order_comments}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $department_id
 * @property integer $order_id
 * @property integer $manager_id
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopsDepartments $department
 * @property UserAdmin $manager
 * @property Orders $order
 * @property Shops $shop
 * @property TransOrderComments[] $transOrderComments
 */
class OrderComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'department_id', 'order_id', 'manager_id', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopsDepartments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAdmin::className(), 'targetAttribute' => ['manager_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('order_comments', 'ID'),
            'shop_id' => Yii::t('order_comments', 'Shop ID'),
            'department_id' => Yii::t('order_comments', 'Department ID'),
            'order_id' => Yii::t('order_comments', 'Order ID'),
            'manager_id' => Yii::t('order_comments', 'Manager ID'),
            'comment' => Yii::t('order_comments', 'Comment'),
            'created_at' => Yii::t('order_comments', 'Created At'),
            'updated_at' => Yii::t('order_comments', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(ShopsDepartments::className(), ['id' => 'department_id'])->inverseOf('orderComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(UserAdmin::className(), ['id' => 'manager_id'])->inverseOf('orderComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id'])->inverseOf('orderComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shops::className(), ['id' => 'shop_id'])->inverseOf('orderComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransOrderComments()
    {
        return $this->hasMany(TransOrderComments::className(), ['order_comments_id' => 'id'])->inverseOf('orderComments');
    }

    /**
     * @inheritdoc
     * @return OrderCommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderCommentsQuery(get_called_class());
    }
}
