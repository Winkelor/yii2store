<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\ShopsSearch $searchModel
 */

$this->title = Yii::t('shops', 'Shops');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shops-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a(Yii::t('shops', 'Create {modelClass}', [
    'modelClass' => 'Shops',
]), ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'short_name',
            'main_user_id',
            'type_id',
            'status_id',
            'address_id',
            'contact_id',
            'created_at',
            'updated_at',
            'country_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['shopskartik/view', 'id' => $model->id, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }
                ],
            ],
        ],

        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => true,
        ],
    ]); Pjax::end(); ?>

</div>

<div class="shops-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $gridcolums = [
        ['class' => 'kartik\grid\CheckboxColumn'],
        ['class' => 'kartik\grid\SerialColumn'],
        [
            # http://demos.krajee.com/grid#expand-row-column
            'class' => '\kartik\grid\ExpandRowColumn',
            'enableRowClick' => false,
            'attribute'=>'id',
            'value' => function($model, $key, $index, $column) {return GridView::ROW_COLLAPSED; },
            'detailUrl'=>Yii::$app->urlManager->createUrl(['catalog/categories/view','id' => 1,]),
            'pageSummary' => false,
            'extraData' => 'extraData',
            'detail' => function($model, $key, $index, $column) {
                $consts = " " . __FILE__ ." and ". __LINE__ .
                    " line and <a href=\"http://demos.krajee.com/grid#expand-row-column\"> read it </a>";
                return "Detal Data from {$model->id} : model->description  put you code to consts";
            },
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'name',
            'pageSummary' => true
        ],
        #'id',
//        #'parent_id',
//        [
//            'class' => '\kartik\grid\DataColumn',
//            'attribute' => 'parent_name',
//            'pageSummary' => true
//        ],
//        'description',
        /*  [
             'attribute'=>'cover_image',
             'value'=>function ($model, $key, $index, $widget) {
                 return "<img src={$model->cover_image} class='img-circle'>";
             },
             # 'filterType'=>GridView::FILTER_ICON,
             'vAlign'=>'middle',
             'format'=>'raw',
             'width'=>'15px',
             'noWrap'=>true
          ],*/
//            'thumbnail',
//            'group_access',
//        [
//            'class'=>'kartik\grid\BooleanColumn',
//            'attribute'=>'displayed',
//            'vAlign'=>'middle',
//        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'vAlign'=>'middle',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-pencil"></span>',
                        Yii::$app->urlManager->createUrl([
                            'catalog/categories/view',
                            'id' => $model->id,
                            #'id' => $model['id'], //  for sql data provider
                            'edit'=>'t'
                        ]),
                        ['title' => Yii::t('yii', 'Edit'),]);
                }
            ],
        ],
    ];

    /*Pjax::begin();*/ echo kartik\grid\GridView::widget([
        # docs
        # https://github.com/kartik-v/yii2-grid
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridcolums,
        'bordered' => true,
        'striped' => true,
        'condensed' => true, // if false - dont work search
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        #'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
        #'showPageSummary' => true,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => GridView::TYPE_INFO, #'type'=>'info',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),                                                                                                                                                          'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
        // set your toolbar
        'toolbar'=> [
            ['content'=> "content toolbar"
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export'=>[
            'fontAwesome'=>true
        ],
        # 'toggleDataContainer' => ['class' => 'btn-group-sm'], // for export
        # 'exportContainer' => ['class' => 'btn-group-sm'],  // for export

    ]); /*Pjax::end();*/
    ?>
</div>
