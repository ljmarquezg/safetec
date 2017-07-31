<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServicesType */

$this->title = 'Update Services Type: ' . $model->id_services;
$this->params['breadcrumbs'][] = ['label' => 'Services Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_services, 'url' => ['view', 'id' => $model->id_services]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="services-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
