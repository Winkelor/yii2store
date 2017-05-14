<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesCategories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_categories', 'Attributes Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attributes-categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('attributes_categories', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('attributes_categories', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('attributes_categories', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'shop_id',
            'category_id',
            'name',
            'description',
            'rank',
            'attribute_type_id',
            'attribute_group_id',
            'is_active',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
