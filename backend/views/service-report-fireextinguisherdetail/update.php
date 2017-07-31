<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisherdetail */

$this->title = 'Update Service Report Fireextinguisherdetail: ' . $model->id_service_report_dire_extinguisher_detail;
$this->params['breadcrumbs'][] = ['label' => 'Service Report Fireextinguisherdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_service_report_dire_extinguisher_detail, 'url' => ['view', 'id' => $model->id_service_report_dire_extinguisher_detail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-report-fireextinguisherdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
