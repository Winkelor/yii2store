<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AttributesTypes */

$this->title = Yii::t('attributes_types', 'Update {modelClass}: ', [
    'modelClass' => 'Attributes Types',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_types', 'Attributes Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('attributes_types', 'Update');
?>
<div class="attributes-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
