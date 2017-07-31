<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_customer_branch')->textInput() ?>

    <?= $form->field($model, 'id_customer')->textInput() ?>

    <?= $form->field($model, 'division_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'division_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'division_address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'division_created')->textInput() ?>

    <?= $form->field($model, 'id_customer_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
