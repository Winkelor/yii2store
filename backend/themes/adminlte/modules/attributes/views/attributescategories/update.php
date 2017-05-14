<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesCategories */

$this->title = Yii::t('attributes_categories', 'Update {modelClass}: ', [
    'modelClass' => 'Attributes Categories',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_categories', 'Attributes Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('attributes_categories', 'Update');
?>
<div class="attributes-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
