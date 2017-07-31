<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\app\App */

$this->title = 'Update App: ' . $model->id_app;
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_app, 'url' => ['view', 'id' => $model->id_app]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
