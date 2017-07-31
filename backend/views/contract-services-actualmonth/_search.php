<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesActualmonthSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-services-actualmonth-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_contract_services') ?>

    <?= $form->field($model, 'id_contract') ?>

    <?= $form->field($model, 'id_contract_services_description') ?>

    <?= $form->field($model, 'last_service') ?>

    <?= $form->field($model, 'next_service') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'id_contract_services_period') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'contract_services_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
