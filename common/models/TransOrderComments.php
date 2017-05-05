<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trans_order_comments}}".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $order_comments_id
 * @property string $comment
 *
 * @property Languages $lang
 * @property OrderComments $orderComments
 */
class TransOrderComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trans_order_comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'required'],
            [['lang_id', 'order_comments_id'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['order_comments_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderComments::className(), 'targetAttribute' => ['order_comments_id' => 'id']],
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
            'order_comments_id' => Yii::t('translate', 'Order Comments ID'),
            'comment' => Yii::t('translate', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id'])->inverseOf('transOrderComments');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComments()
    {
        return $this->hasOne(OrderComments::className(), ['id' => 'order_comments_id'])->inverseOf('transOrderComments');
    }

    /**
     * @inheritdoc
     * @return TransOrderCommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransOrderCommentsQuery(get_called_class());
    }
}
