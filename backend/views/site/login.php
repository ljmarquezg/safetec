<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->context->layout = 'login';
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
<div style="background:red; position:fixed; top: 0; bottom: 0; left:0; right: 0; z-index: -99">
</div>

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3" style="background:rgba(255,255,255,0.75); border:solid 1px #eee; box-shadow:  0px 0px 3px 0px #ddd; border-radius: 5px; z-index: 1">
        <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
