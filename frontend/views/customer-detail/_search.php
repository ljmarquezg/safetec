<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\customer\CustomerDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_customer_detail') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'id_customer_division') ?>

    <?= $form->field($model, 'id_customer_detail_type') ?>

    <?= $form->field($model, 'customer_detail_value') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
