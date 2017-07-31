<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\contract\ContractServicesPeriodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contract Services Periods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-period-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contract Services Period', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_contract_services_period',
            'contract_services_period',
            'contract_service_period_month',
            'contract_services_expire',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
