<?php

use backend\components\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductsAttributesLogisticsInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('products_attributes_logistics_info', 'Products Attributes Logistics Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-attributes-logistics-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('products_attributes_logistics_info', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('products_attributes_logistics_info', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('products_attributes_logistics_info', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'shop_id',
            'department_id',
            'product_id',
            'purchase_price',
            'selling_price',
            'count',
            'shipping_box_info_id',
            'status_id',
            'is_action',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
