<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%comment_status}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 */
class CommentStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment_status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('comment_status', 'ID'),
            'name' => Yii::t('comment_status', 'Name'),
            'description' => Yii::t('comment_status', 'Description'),
            'is_active' => Yii::t('comment_status', 'Is Active'),
            'created_at' => Yii::t('comment_status', 'Created At'),
            'updated_at' => Yii::t('comment_status', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return CommentStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentStatusQuery(get_called_class());
    }
}
