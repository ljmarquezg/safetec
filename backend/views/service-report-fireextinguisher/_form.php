<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-report-fireextinguisher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_service_report_fire_extinguisher')->textInput() ?>

    <?= $form->field($model, 'id_customer')->textInput() ?>

    <?= $form->field($model, 'id_customer_division')->textInput() ?>

    <?= $form->field($model, 'id_employees')->textInput() ?>

    <?= $form->field($model, 'id_services_type')->textInput() ?>

    <?= $form->field($model, 'service_report_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_report_date')->textInput() ?>

    <?= $form->field($model, 'id_contract')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
