<?php

use backend\components\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AttributesCategories */

$this->title = Yii::t('attributes_categories', 'Create Attributes Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('attributes_categories', 'Attributes Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attributes-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
