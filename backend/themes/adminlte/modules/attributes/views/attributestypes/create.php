<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AttributesTypes */

$this->title = Yii::t('attributes_types', 'Create Attributes Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_types', 'Attributes Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attributes-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
