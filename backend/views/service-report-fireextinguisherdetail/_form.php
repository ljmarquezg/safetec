<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisherdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-report-fireextinguisherdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_service_report_dire_extinguisher_detail')->textInput() ?>

    <?= $form->field($model, 'id_service_report_fire_extinguisher')->textInput() ?>

    <?= $form->field($model, 'id_technician')->textInput() ?>

    <?= $form->field($model, 'id_contract_service_type')->textInput() ?>

    <?= $form->field($model, 'id_products_category')->textInput() ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'id_serial')->textInput() ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_t_date')->textInput() ?>

    <?= $form->field($model, 'retest')->textInput() ?>

    <?= $form->field($model, 'hydrotest')->textInput() ?>

    <?= $form->field($model, 'ok')->textInput() ?>

    <?= $form->field($model, 'not_ok')->textInput() ?>

    <?= $form->field($model, 'other')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
