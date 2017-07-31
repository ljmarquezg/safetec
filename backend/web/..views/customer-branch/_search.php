<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-branch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_customer_branch') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'division_name') ?>

    <?= $form->field($model, 'division_address') ?>

    <?= $form->field($model, 'division_address2') ?>

    <?php // echo $form->field($model, 'division_created') ?>

    <?php // echo $form->field($model, 'id_customer_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
