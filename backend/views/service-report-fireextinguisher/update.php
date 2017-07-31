<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisher */

$this->title = 'Update Service Report Fireextinguisher: ' . $model->id_service_report_fire_extinguisher;
$this->params['breadcrumbs'][] = ['label' => 'Service Report Fireextinguishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_service_report_fire_extinguisher, 'url' => ['view', 'id' => $model->id_service_report_fire_extinguisher]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-report-fireextinguisher-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
