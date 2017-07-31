<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\services\ServiceReportFireextinguisherdetail */

$this->title = $model->id_service_report_dire_extinguisher_detail;
$this->params['breadcrumbs'][] = ['label' => 'Service Report Fireextinguisherdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-report-fireextinguisherdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_service_report_dire_extinguisher_detail], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_service_report_dire_extinguisher_detail], [
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
            'id_service_report_dire_extinguisher_detail',
            'id_service_report_fire_extinguisher',
            'id_technician',
            'id_contract_service_type',
            'id_products_category',
            'qty',
            'description',
            'id_serial',
            'location',
            'last_t_date',
            'retest',
            'hydrotest',
            'ok',
            'not_ok',
            'other',
            'remarks',
            'status',
            'created_date',
        ],
    ]) ?>

</div>
