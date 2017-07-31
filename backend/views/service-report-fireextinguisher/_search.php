<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-report-fireextinguisher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_service_report_fire_extinguisher') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'id_customer_division') ?>

    <?= $form->field($model, 'id_employees') ?>

    <?= $form->field($model, 'id_services_type') ?>

    <?php // echo $form->field($model, 'service_report_number') ?>

    <?php // echo $form->field($model, 'service_report_date') ?>

    <?php // echo $form->field($model, 'id_contract') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
