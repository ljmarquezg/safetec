<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_contract') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'id_customer_division') ?>

    <?= $form->field($model, 'contract_number') ?>

    <?= $form->field($model, 'contract_start') ?>

    <?php // echo $form->field($model, 'contract_expire') ?>

    <?php // echo $form->field($model, 'contract_information') ?>

    <?php // echo $form->field($model, 'id_contract_period') ?>

    <?php // echo $form->field($model, 'id_contract_status') ?>

    <?php // echo $form->field($model, 'contract_created') ?>

    <?php // echo $form->field($model, 'purchace_order') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
