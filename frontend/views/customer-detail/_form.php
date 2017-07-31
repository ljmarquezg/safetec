<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\customer\CustomerDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_customer')->textInput() ?>

    <?= $form->field($model, 'id_customer_division')->textInput() ?>

    <?= $form->field($model, 'id_customer_detail_type')->dropDownList([ 'Phone' => 'Phone', 'E-mail' => 'E-mail', 'Fax' => 'Fax', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'customer_detail_value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
