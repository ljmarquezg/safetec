<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesPeriodSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-services-period-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_contract_services_period') ?>

    <?= $form->field($model, 'contract_services_period') ?>

    <?= $form->field($model, 'contract_service_period_month') ?>

    <?= $form->field($model, 'contract_services_expire') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
