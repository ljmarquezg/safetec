<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\services\ServicesControlDateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services Control Dates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-control-date-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Services Control Date', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_service_control_date',
            'id_contract_services',
            'service_control_date_start',
            'service_control_date_expire',
            'service_control_date_status',
            // 'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
