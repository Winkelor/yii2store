<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AttributesGroups */

$this->title = Yii::t('attributes_groups', 'Create Attributes Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_groups', 'Attributes Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attributes-groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
