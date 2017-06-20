<?php

use backend\components\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesProductsGroup */

$this->title = Yii::t('attributes_products_group', 'Update {modelClass}: ', [
    'modelClass' => 'Attributes Products Group',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_products_group', 'Attributes Products Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('attributes_products_group', 'Update');
?>
<div class="attributes-products-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
