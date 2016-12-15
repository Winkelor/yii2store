<?php

namespace backend\modules\winkelor\modules\rbac\controllers;

use yii;
use yii\web\Controller;
use backend\components\behaviors\MyBehavior as MyBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

# https://yiiframework.com.ua/ru/doc/guide/2/concept-behaviors/

/**
 * Default controller for the `rbac` module
 */
class TreshController extends Controller
{
    public function behaviors()
    {
        return [
            // анонимное поведение, прикрепленное по имени класса
            MyBehavior::className(),

            // именованное поведение, прикрепленное по имени класса
            'myBehavior2' => MyBehavior::className(),

            // анонимное поведение, сконфигурированное с использованием массива
            [
                'class' => MyBehavior::className(),
                'prop1' => 'value1',
                'prop2' => 'value2',
            ],

            // именованное поведение, сконфигурированное с использованием массива
            'myBehavior4' => [
                'class' => MyBehavior::className(),
                'prop1' => 'value1',
                'prop2' => 'value2',
            ],
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $isGuest = (Yii::$app->user->isGuest) ? 'Гость' : 'Не гость';
        $user = (!Yii::$app->user->isGuest) ? Yii::$app->user : false;
        $kurwa = Yii::$app->MyBehavior->foo();
        $data = compact('isGuest', 'user', 'trash', 'kurwa');
        return $this->render('index', $data);
    }


}
