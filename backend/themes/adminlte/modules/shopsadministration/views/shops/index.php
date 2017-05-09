<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ShopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


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
            ['class' => 'yii\grid\ActionColumn'],
            // 'filter' => Html::activeDropDownList($searchModel, 'stats',
            // Accounts::getStatusList(), ['class' => 'form-control', 'multiple' => true]),
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
