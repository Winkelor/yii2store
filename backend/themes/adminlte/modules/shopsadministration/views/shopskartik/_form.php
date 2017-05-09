<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Shops $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="shops-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'main_user_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Main User ID...']],

            'type_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Type ID...']],

            'status_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Status ID...']],

            'address_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Address ID...']],

            'contact_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Contact ID...']],

            'created_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Created At...']],

            'updated_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Updated At...']],

            'country_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Country ID...']],

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Name...', 'maxlength' => 255]],

            'short_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Short Name...', 'maxlength' => 255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
