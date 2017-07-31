<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsBranch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_products_brand')->textInput() ?>

    <?= $form->field($model, 'products_brand_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_brand_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
