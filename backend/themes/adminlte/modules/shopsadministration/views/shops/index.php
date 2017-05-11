<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ShopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\UserAdmin;


$this->title = Yii::t('shops', 'Shops');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shops-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('shops', 'Create Shops'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['style' => 'white-space:nowrap;'], // http://stackoverflow.com/questions/35412564/yii2-how-can-i-specify-width-only-for-the-certain-column-in-gridview-widget
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'html',
                'format'=>'raw',
                'value' => function($data){
                    return "
                    <span class=\"label label-success\">Approved</span>
                    ";
                },
                'contentOptions'=>['style'=>'max-width: 100px;'],  // https://github.com/yiisoft/yii2/issues/5299
            ],
            [
                'label'=>'html',
                'format'=>'raw',
                'value' => function($data){
                    return "
                    <div class=\"progress progress-xs\">
                      <div class=\"progress-bar progress-bar-danger\" style=\"width: 55%\"></div>
                    </div>
                    ";
                },
                'contentOptions'=>['style'=>'max-width: 100px;'],  // https://github.com/yiisoft/yii2/issues/5299
            ],
//            'id',
            'name',
            'short_name',
            [
                'label' => 'Main User',
                'attribute'=>'main_user_id',
                'value'=>'mainUser.username',
                'filter' => Html::activeDropDownList(
                    $searchModel, 'main_user_id',
                    ArrayHelper::map(UserAdmin::find()->all(), 'id', 'username'),
                    ['class'=>'form-control','prompt' => 'Select Main User']),
            ],

//             'type_id',
//             'status_id',
//             'address_id',
//             'contact_id',
//             'created_at:datetime',
//             'updated_at:datetime',
//             'country_id',

//image example
//            [
//                'label'=>'Image',
//                'format'=>'raw',
//                'value' => function($data){
//                    $url = "http://www.itmathrepetitor.ru/wp-content/uploads/2015/02/yiidebug1.png";
//                    return Html::img($url,['alt'=>'yii']);
//                }
//            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
