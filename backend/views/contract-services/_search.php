<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-services-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_contract_service') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'id_customer_branch') ?>

    <?= $form->field($model, 'id_contract') ?>

    <?= $form->field($model, 'id_contract_services_description') ?>

    <?php // echo $form->field($model, 'contract_services_start') ?>

    <?php // echo $form->field($model, 'contract_services_expire') ?>

    <?php // echo $form->field($model, 'last_service') ?>

    <?php // echo $form->field($model, 'next_service') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'id_contract_services_period') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'id_contract_services_status') ?>

    <?php // echo $form->field($model, 'purchace_order') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
