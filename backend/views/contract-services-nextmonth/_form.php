<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServicesNextmonth */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-services-nextmonth-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_contract_services')->textInput() ?>

    <?= $form->field($model, 'id_contract')->textInput() ?>

    <?= $form->field($model, 'id_contract_services_description')->textInput() ?>

    <?= $form->field($model, 'last_service')->textInput() ?>

    <?= $form->field($model, 'next_service')->textInput() ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'id_contract_services_period')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'contract_services_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
