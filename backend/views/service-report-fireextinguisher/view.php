<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisher */

$this->title = $model->id_service_report_fire_extinguisher;
$this->params['breadcrumbs'][] = ['label' => 'Service Report Fireextinguishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-report-fireextinguisher-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_service_report_fire_extinguisher], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_service_report_fire_extinguisher], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_service_report_fire_extinguisher',
            'id_customer',
            'id_customer_division',
            'id_employees',
            'id_services_type',
            'service_report_number',
            'service_report_date',
            'id_contract',
            'remarks',
            'created_date',
        ],
    ]) ?>

</div>
