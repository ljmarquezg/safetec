<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServicesControlDate */

$this->title = 'Update Services Control Date: ' . $model->id_service_control_date;
$this->params['breadcrumbs'][] = ['label' => 'Services Control Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_service_control_date, 'url' => ['view', 'id' => $model->id_service_control_date]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="services-control-date-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
