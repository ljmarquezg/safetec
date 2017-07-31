<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServicesControlDate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-control-date-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_service_control_date')->textInput() ?>

    <?= $form->field($model, 'id_contract_services')->textInput() ?>

    <?= $form->field($model, 'service_control_date_start')->textInput() ?>

    <?= $form->field($model, 'service_control_date_expire')->textInput() ?>

    <?= $form->field($model, 'service_control_date_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
