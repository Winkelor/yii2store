<?php

use backend\components\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsAttributesLogisticsInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('products_attributes_logistics_info', 'Products Attributes Logistics Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-attributes-logistics-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('products_attributes_logistics_info', 'Create Products Attributes Logistics Info'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shop_id',
            'department_id',
            'product_id',
            'purchase_price',
            // 'selling_price',
            // 'count',
            // 'shipping_box_info_id',
            // 'status_id',
            // 'is_action',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
