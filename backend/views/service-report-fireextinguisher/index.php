<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\services\ServiceReportFireextinguisherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Report Fireextinguishers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-report-fireextinguisher-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Service Report Fireextinguisher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_service_report_fire_extinguisher',
            'id_customer',
            'id_customer_division',
            'id_employees',
            'id_services_type',
            // 'service_report_number',
            // 'service_report_date',
            // 'id_contract',
            // 'remarks',
            // 'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
