<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServicesControlDateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-control-date-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_service_control_date') ?>

    <?= $form->field($model, 'id_contract_services') ?>

    <?= $form->field($model, 'service_control_date_start') ?>

    <?= $form->field($model, 'service_control_date_expire') ?>

    <?= $form->field($model, 'service_control_date_status') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
