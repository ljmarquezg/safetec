<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\services\ServiceReportFireextinguisherdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Report Fireextinguisherdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-report-fireextinguisherdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Service Report Fireextinguisherdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_service_report_dire_extinguisher_detail',
            'id_service_report_fire_extinguisher',
            'id_technician',
            'id_contract_service_type',
            'id_products_category',
            // 'qty',
            // 'description',
            // 'id_serial',
            // 'location',
            // 'last_t_date',
            // 'retest',
            // 'hydrotest',
            // 'ok',
            // 'not_ok',
            // 'other',
            // 'remarks',
            // 'status',
            // 'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
