<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesPeriod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-services-period-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contract_services_period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_service_period_month')->textInput() ?>

    <?= $form->field($model, 'contract_services_expire')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
