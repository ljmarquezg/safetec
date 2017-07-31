<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisherdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-report-fireextinguisherdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_service_report_dire_extinguisher_detail') ?>

    <?= $form->field($model, 'id_service_report_fire_extinguisher') ?>

    <?= $form->field($model, 'id_technician') ?>

    <?= $form->field($model, 'id_contract_service_type') ?>

    <?= $form->field($model, 'id_products_category') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'id_serial') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'last_t_date') ?>

    <?php // echo $form->field($model, 'retest') ?>

    <?php // echo $form->field($model, 'hydrotest') ?>

    <?php // echo $form->field($model, 'ok') ?>

    <?php // echo $form->field($model, 'not_ok') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
