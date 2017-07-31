<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractPeriod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-period-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contract_period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_period_month')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
