<?php

use backend\components\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesProductsGroup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_products_group', 'Attributes Products Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attributes-products-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('attributes_products_group', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('attributes_products_group', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('attributes_products_group', 'Are you sure you want to delete this item?'),
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
            'products_attributes_logistics_inf_id',
            'attribute_product_id',
            'attribute_category_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
