<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\contract\ContractServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contract Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contract Services', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_contract_service',
            'id_customer',
            'id_customer_branch',
            'id_contract',
            'id_contract_services_description',
            // 'contract_services_start',
            // 'contract_services_expire',
            // 'last_service',
            // 'next_service',
            // 'qty',
            // 'description',
            // 'cost',
            // 'id_contract_services_period',
            // 'total',
            // 'id_contract_services_status',
            // 'purchace_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
